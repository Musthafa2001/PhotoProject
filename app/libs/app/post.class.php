<?php 
class post{
    public static function registerpost($text,$image_tmp){
       $auther=session::getuser()->getemail();
       $image_name=md5($text).".jpg";
       $image_path="/app/".$image_name;
       move_uploaded_file($image_tmp,$image_path);
       $insert="INSERT INTO `post` (`posttext`, `image`, `likecount`, `uploadtime`, `owner`)
VALUES ($text, 'https://fastly.picsum.photos/id/852/200/300.jpg?hmac=6IMZOkPF_q5nf8IwfYdfxPUyKnyPL1w8moDjTeMOT5g', '0', now(), session::getuser()->getusername);";

    }

}

?>