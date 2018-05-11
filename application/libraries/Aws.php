<?php  defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Credentials\Credentials;
use Aws\S3\Exception\S3Exception;

class Aws extends CI_Controller 
{
    private $s3=null;
    private $credentials=null;    
    private $s3Key;
    private $s3Secret;
    private $version;
    private $region;
    private $bucket;
    private $config;
    
    function __construct()  
    {   

        $this->config   =& get_config();
        $this->s3Key    =$this->config['s3Key'];
        $this->s3Secret =$this->config['s3Secret'];
        $this->version  =$this->config['version'];
        $this->region   =$this->config['region'];
        $this->bucket   =$this->config['bucket'];
        
        $this->s3Connect();
    }


    function s3Connect(){
        $this->credentials = new Credentials($this->s3Key,$this->s3Secret);

        try{
            $this->s3 = new S3Client([
            'version' => $this->version,
            'region'  => $this->region,
            'credentials'     => $this->credentials        
            ]);
        } catch(S3Exception $e){
           echo($e);
        }
    }

    function getList(){
        
        try{
            $ListObjects = $this->s3->ListObjects([
                'Bucket' => $this->bucket
            ]);
        } catch(S3Exception $e){
           echo($e);
        }

        return $ListObjects;
    }


    function getObject($key){
        
        try{
            $getObject = $this->s3->getObject([
                'Bucket' => $this->bucket,
                'Key' => $key
            ]);
        } catch(S3Exception $e){
           echo($e);
        }

        return $getObject;
    }


    function getObjectUrl($key){
        
        try{
            $getObjectUrl = $this->s3->getObjectUrl([
                'Bucket' => $this->bucket,
                'Key' => $key
            ]);
        } catch(S3Exception $e){
           echo($e);
        }

        return $getObjectUrl;
    }

    function putObject($key,$uploadfile){
        
        try{
            $putObject = $this->s3->putObject([
                'Bucket' => $this->bucket,
                'Key'    => $key,
                'Body'   => fopen($uploadfile, 'r'),
                'ACL'    => 'public-read',
                'ContentType'=>mime_content_type($uploadfile)
            ]);

        } catch(S3Exception $e){
           echo ($e);
        }
        
        return $putObject;
    }

    function deleteObject($key){        
        try{
            $deleteObject = $this->s3->deleteObject([
                'Bucket' => $this->bucket,
                'Key'    => $key
            ]);
        } catch(S3Exception $e){
           echo ($e);
        }

        return $deleteObject;
    }


    function downloadObject($key,$saveAsKey){
        
        try{
            $downloadObject = $this->s3->getObject([
                'Bucket' => $this->bucket,
                'Key'    => $key,
                'SaveAs'=>fopen('/tmp/'.$saveAsKey, 'w')
            ]);
        } catch(S3Exception $e){
           echo ($e);
        }

        return $downloadObject;
    }
}