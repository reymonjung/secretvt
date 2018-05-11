<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Event model class
 *
 * Copyright (c) CIBoard <www.ciboard.co.kr>
 *
 * @author CIBoard (develop@ciboard.co.kr)
 */

class Event_model extends CB_Model
{

    /**
     * 테이블명
     */
    public $_table = 'event';

    /**
     * 사용되는 테이블의 프라이머리키
     */
    public $primary_key = 'eve_id'; // 사용되는 테이블의 프라이머리키

    public $cache_time = 86400; // 캐시 저장시간

    function __construct()
    {
        parent::__construct();

        check_cache_dir('event');
    }


    public function get_admin_list($limit = '', $offset = '', $where = '', $like = '', $findex = '', $forder = '', $sfield = '', $skeyword = '', $sop = 'OR')
    {
        $result = $this->_get_list_common($select = '', $join = '', $limit, $offset, $where, $like, $findex, $forder, $sfield, $skeyword, $sop);
        return $result;
    }


    public function get_today_list()
    {
        $cachename = 'event/event-info-' . cdate('Y-m-d');
        $data = array();
        if ( ! $data = $this->cache->get($cachename)) {
            $this->db->from($this->_table);
            $this->db->where('eve_activated', 1);
            $this->db->group_start();
            $this->db->where(array('eve_start_date <=' => cdate('Y-m-d')));
            $this->db->or_where(array('eve_start_date' => null));
            $this->db->group_end();
            $this->db->group_start();
            $this->db->where('eve_end_date >=', cdate('Y-m-d'));
            $this->db->or_where('eve_end_date', '0000-00-00');
            $this->db->or_where(array('eve_end_date' => ''));
            $this->db->or_where(array('eve_end_date' => null));
            $this->db->group_end();
            $res = $this->db->get();
            $result['list'] = $res->result_array();

            $data['result'] = $result;
            $data['cached'] = '1';

            $this->cache->save($cachename, $data, $this->cache_time);
        }
        return isset($data['result']) ? $data['result'] : false;
    }

    public function get_prev_next_post($post_id = 0, $post_num = 0, $type = '', $where = '', $sfield = '', $skeyword = '', $sop = 'OR')
    {
        $post_id = (int) $post_id;
        if (empty($post_id) OR $post_id < 1) {
            return false;
        }

        $sop = (strtoupper($sop) === 'AND') ? 'AND' : 'OR';
        if (empty($sfield)) {
            $sfield = array('eve_title', 'eve_content');
        }

        $search_where = array();
        $search_like = array();
        $search_or_like = array();
        if ($sfield && is_array($sfield)) {
            foreach ($sfield as $skey => $sval) {
                $ssf = $sval;
                if ($skeyword && $ssf && in_array($ssf, $this->allow_search_field)) {
                    if (in_array($ssf, $this->search_field_equal)) {
                        $search_where[$ssf] = $skeyword;
                    } else {
                        $swordarray = explode(' ', $skeyword);
                        foreach ($swordarray as $str) {
                            if (empty($ssf)) {
                                continue;
                            }
                            if ($sop === 'AND') {
                                $search_like[] = array($ssf => $str);
                            } else {
                                $search_or_like[] = array($ssf => $str);
                            }
                        }
                    }
                }
            }
        } else {
            $ssf = $sfield;
            if ($skeyword && $ssf && in_array($ssf, $this->allow_search_field)) {
                if (in_array($ssf, $this->search_field_equal)) {
                    $search_where[$ssf] = $skeyword;
                } else {
                    $swordarray = explode(' ', $skeyword);
                    foreach ($swordarray as $str) {
                        if (empty($ssf)) {
                            continue;
                        }
                        if ($sop === 'AND') {
                            $search_like[] = array($ssf => $str);
                        } else {
                            $search_or_like[] = array($ssf => $str);
                        }
                    }
                }
            }
        }

        $this->db->select('event.*, member.mem_id, member.mem_userid, member.mem_nickname, member.mem_icon, member.mem_photo, member.mem_point');
        $this->db->from($this->_table);
        $this->db->join('member', 'event.mem_id = member.mem_id', 'left');

        if ($type === 'next') {
            $where['eve_id >'] = $post_id;
        } else {
            $where['eve_id <'] = $post_id;
        }

        if ($where) {
            $this->db->where($where);
        }
        
        if ($search_where) {
            $this->db->where($search_where);
        }
        if ($search_like) {
            foreach ($search_like as $item) {
                foreach ($item as $skey => $sval) {
                    $this->db->like($skey, $sval);
                }
            }
        }
        if ($search_or_like) {
            $this->db->group_start();
            foreach ($search_or_like as $item) {
                foreach ($item as $skey => $sval) {
                    $this->db->or_like($skey, $sval);
                }
            }
            $this->db->group_end();
        }

        $orderby = $type === 'next'
            ? 'eve_id' : 'eve_id desc';

        $this->db->order_by($orderby);
        $this->db->limit(1);
        $qry = $this->db->get();
        $result = $qry->row_array();

        return $result;
    }


    public function delete($primary_value = '', $where = '')
    {
        $result = parent::delete($primary_value, $where);
        $this->cache->delete('event/event-info-' . cdate('Y-m-d'));

        return $result;
    }


    public function update($primary_value = '', $updatedata = '', $where = '')
    {
        $result = parent::update($primary_value, $updatedata);
        $this->cache->delete('event/event-info-' . cdate('Y-m-d'));

        return $result;
    }
}
