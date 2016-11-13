<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
set_time_limit(0);
class cron extends Website_Controller {

    public function index()
    {
        $this->convertVideos();
    }
    public function convertVideos(){

        define('ffmpeg', '/usr/bin/ffmpeg');
        define('FFMPEG_BINARY', '/usr/bin/ffmpeg');
        define('FFMPEG_movie', '/usr/bin/ffmpeg_movie');
        define('flvtool2Path', '/usr/bin/flvtool2');

        $videoDirName=FCPATH."assets/uploads/files/video/video/";  //Folder name where video will save
        $videoThumDir=FCPATH."assets/uploads/files/video/thum/";

        $this->db->select('id, video_file');
        $videos = $this->db->get_where('video',array('converted'=>1))->result();

        foreach ($videos as $video) {
            //$i++;
            $fileNameNoExtension = preg_replace("/\.[^.]+$/", "", $video->video_file);
            $video_path = FCPATH."assets/uploads/video/$video->video_file";

            $randomString = $video->id."_".substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

            $destinationVideo = $videoDirName."{$randomString}.webm";
            $destinationThum = $videoThumDir."{$randomString}.jpg";
            shell_exec("ffmpeg -i $video_path -vcodec libvpx -acodec libvorbis $destinationVideo 2>&1");
            shell_exec("ffmpeg -i $destinationVideo -f mjpeg -t 0.050 $destinationThum 2>&1");
            $data["converted"] = 1;
            $data["converted_name"] = $randomString;
            $this->db->update('video', $data, "id = $video->id");
        }

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
