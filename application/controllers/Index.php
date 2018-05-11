<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Main class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

/**
 * 메인 페이지를 담당하는 controller 입니다.
 */
class Index extends CB_Controller
{

    /**
     * 모델을 로딩합니다
     */
    protected $models = array('Board','Event','Notice');

    /**
     * 헬퍼를 로딩합니다
     */
    protected $helpers = array('form', 'array');

    function __construct()
    {
        parent::__construct();

        /**
         * 라이브러리를 로딩합니다
         */
        $this->load->library(array('querystring'));
    }


    /**
     * 전체 메인 페이지입니다
     */
    public function index()
    {
        // 이벤트 라이브러리를 로딩합니다
        $eventname = 'event_main_index';
        $this->load->event($eventname);

        $view = array();
        $view['view'] = array();

        // 이벤트가 존재하면 실행합니다
        $view['view']['event']['before'] = Events::trigger('before', $eventname);

        $where = array(
            'brd_search' => 1,
            'bgr_id' => 1,
        );
        $board_id = $this->Board_model->get_board_list($where);
        $board_list = array();
        if ($board_id && is_array($board_id)) {
            foreach ($board_id as $key => $val) {
                $board_list[] = $this->board->item_all(element('brd_id', $val));
            }
        }
        $view['view']['board_list'] = $board_list;
        $view['view']['canonical'] = site_url();

        if(empty(get_cookie('region'))) $view['view']['region']=0;
        else $view['view']['region'] = 0;
        // else $view['view']['region'] = get_cookie('region');

        // 이벤트가 존재하면 실행합니다
        $view['view']['event']['before_layout'] = Events::trigger('before_layout', $eventname);

        
        $notiwhere = array(
                'noti_activated' => 1,
            );

        $notice_result = $this->Notice_model
            ->get('', '', $notiwhere, 1, 0, 'noti_id', 'desc');
        
        $view['view']['notice_result'] = $notice_result;
        $view['view']['notice_url'] = document_board_url('notice');

        if (( ctimestamp() - strtotime(element('noti_datetime', element(0,$notice_result))) <= 3 * 3600)) {

                    $view['view']['notice']['is_new'] = true;
                }

        $evewhere = array(
                'eve_activated' => 1,
            );

        $event_result = $this->Event_model
            ->get('', '', $evewhere, 1, 0, 'eve_id', 'desc');

        $view['view']['event_result'] = $event_result;
        $view['view']['event_url'] = document_board_url('event');
        if (( ctimestamp() - strtotime(element('eve_datetime', element(0,$event_result))) <= 3 * 3600)) {
            
                    $view['view']['event']['is_new'] = true;
                }
        /**
         * 레이아웃을 정의합니다
         */
        $page_title = $this->cbconfig->item('site_meta_title_main');
        $meta_description = $this->cbconfig->item('site_meta_description_main');
        $meta_keywords = $this->cbconfig->item('site_meta_keywords_main');
        $meta_author = $this->cbconfig->item('site_meta_author_main');
        $page_name = $this->cbconfig->item('site_page_name_main');
        if($this->input->get('skin')){
            $skin = $this->input->get('skin');
        } else $skin = 'index';
        
        $layoutconfig = array(
            'path' => 'index',
            'layout' => 'layout',
            'skin' => $skin,
            'layout_dir' => 'mobile_index',
            'mobile_layout_dir' => 'mobile_index',
            'use_sidebar' => $this->cbconfig->item('sidebar_main'),
            'use_mobile_sidebar' => $this->cbconfig->item('mobile_sidebar_main'),
            'skin_dir' => $this->cbconfig->item('skin_main'),
            'mobile_skin_dir' => $this->cbconfig->item('mobile_skin_main'),
            'page_title' => $page_title,
            'meta_description' => $meta_description,
            'meta_keywords' => $meta_keywords,
            'meta_author' => $meta_author,
            'page_name' => $page_name,
        );

        
        $view['layout'] = $this->managelayout->front($layoutconfig, $this->cbconfig->get_device_view_type());
        $this->data = $view;
        $this->layout = element('layout_skin_file', element('layout', $view));
        $this->view = element('view_skin_file', element('layout', $view));
    }
}
