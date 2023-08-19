<?php
/**
##############Coded by HamZaoui_BX19################
# to understand more try: var_dump() or print_r()
##############Coded by HamZaoui_BX19################
 */
Class AdminCgc {
	public $_email,$_pwd,$_nom,$_level,$_log,$_ip,$_del;
	public function getnom(){ return $this->_nom; }
	public function getemail(){ return $this->_email; }
	public function getpwd(){ return $this->_pwd; }
	public function getlevel(){ return $this->_level; }
	public function getlast_log(){ return $this->_log; }
	public function getlog_ip(){ return $this->_ip; }
	public function getdel(){ return $this->_del; }

	public function setnom($m){ $this->_nom= $m; }
	public function setemail($p){ $this->_email = $p; }
	public function setpwd($p){ $this->_pwd = $p ; }
	public function setlevel($p){ $this->_level = $p ; }
	public function setlast_log($p){ $this->_log = $p; }
	public function setlog_ip($p){ $this->_ip = $p; }
	public function setdel($p){ $this->_del = $p; }
	public function adminItem(array $param){
		foreach ($param as $key => $val){
			$m = "set".$key;
			$this->$m($val) ;
		}
	}
}
class MemberCgc extends AdminCgc{
	public $_tel , $_filiere;
	public function gettel(){ return $this->_tel; }
	public  function getfiliere(){ return $this->_filiere; }

	public function settel($m){ $this->_tel= $m; }
	public function setfiliere($m){ $this->_filiere = $m; }
	public function memberItem(array $param){
	   foreach ($param as $key => $val){
	       $m = "set".$key;
	       $this->$m($val) ;
	   }
	}
}
class IscriptionCgc extends AdminCgc{
	public $_id , $_event_id;
	public function getid(){ return $this->_id; }
	public  function getevent_id(){ return $this->_event_id; }

	public function setid($m){ $this->_id= $m; }
	public function setevent_id($m){ $this->_event_id = $m; }
	public function inscriptionItem(array $param){
	   foreach ($param as $key => $val){
	       $m = "set".$key;
	       $this->$m($val) ;
	   }
	}
}
class BookCgc extends CategoryCgc {
	public $_photo, $_desc,$_link,$_date_book,$_id_category,$_author;
	public function getphoto(){ return $this->_photo; }
	public function getdescription(){ return $this->_desc; }
	public function getlink(){ return $this->_link; }
	public function getid_category(){ return $this->_id_category; }
	public function getdate_book(){ return $this->_date_book; }
	public function getauthor(){ return $this->_author; }

	public function setphoto($p){ $this->_photo= $p; }
	public function setdescription($p){ $this->_desc = $p; }
	public function setlink($p){ $this->_link = $p; }
	public function setid_category($p){ $this->_id_category= $p; }
	public function setdate_book($p){ $this->_date_book = $p; }
	public function setauthor($p){ $this->_author = $p; }
	public function bookItem(array $param){
		foreach ($param as $key => $val){
			$m = "set".$key;
			$this->$m($val) ;
		}
	}
}
class CategoryCgc {
	public $_id,$_title,$_active;
	public function getid(){ return $this->_id; }
	public function gettitle(){ return $this->_title; }
	public function getactive(){ return $this->_active; }

	public function setid($p){ return $this->_id = $p; }
	public function settitle($p){ $this->_title = $p; }
	public function setactive($p){ $this->_active = $p; }
	public function categoryItem(array $param){
		foreach ($param as $key => $val){
			$m = "set".$key;
			$this->$m($val) ;
		}
	}
}
class EventCgc extends BookCgc {
	public $_date_event, $_prix;
	public function getdate_event(){ return $this->_date_event; }
	public function getprix(){ return $this->_prix; }
	public function setdate_event($p){ $this->_date_event = $p; }
	public function setprix($p){ $this->_prix = $p; }
	public function eventItem(array $param){
		foreach ($param as $key => $val){
			$m = "set".$key;
			$this->$m($val) ;
		}
	}
}
class NewsCgc extends BookCgc {
	public $_date_news, $_photo2, $_tags;
	public function getdate_news(){ return $this->_date_news; }
	public function getphoto2(){ return $this->_photo2; }
	public function gettags(){ return $this->_tags; }
	public function settags($p){ $this->_tags = $p; }
	public function setphoto2($p){ $this->_photo2 = $p; }
	public function setdate_news($p){ $this->_date_news = $p; }
	public function newsItem(array $param){
		foreach ($param as $key => $val){
			$m = "set".$key;
			$this->$m($val) ;
		}
	}
}

class ContactCgc extends CategoryCgc{
	public $_nom_prenom,$_sujet,$_msg,$_date_msg,$_send_ip,$_sender_email;
	public function getnom_prenom(){ return $this->_nom_prenom; }
	public function getsender_email(){ return $this->_sender_email; }
	public function getsujet(){ return $this->_sujet; }
	public function getmsg(){ return $this->_msg; }
	public function getdate_msg(){ return $this->_date_msg; }
	public function getsend_ip(){ return $this->_send_ip; }

	public function setnom_prenom($p){ $this->_nom_prenom = $p; }
	public function setsender_email($p){ $this->_sender_email = $p; }
	public function setsujet($p){ $this->_sujet = $p; }
	public function setdate_msg($p){ $this->_date_msg = $p; }
	public function setmsg($p){ $this->_msg = $p; }
	public function setsend_ip($p){ $this->_send_ip = $p; }
	public function contactItem(array $param){
		foreach ($param as $key => $val){
			$m = "set".$key;
			$this->$m($val) ;
		}
	}
}


class Upload {
	public  $nom , $type , $dir , $tmp , $taille , $error , $typesValides=array(), $extValides=array() ;
	public function __construct($f){
		$this->tmp  = $f['tmp_name'];
		$this->nom = $f['name'];
		$this->type = $f['type'];
		$this->taille = $f['size'];
	 }
	public function typesValides($t){ //set ur filtre
 		$this->typesValides = $t;
 	}
	public function extValides($ext){ //set ur filtre
		$this->extValides = $ext;
	}
	public function changeName($name){
		$ext = pathinfo($this->nom);
		$this->nom = $name.'.'.$ext['extension'];
	}
	//p1 :  your target dir
	//p2 :  Max Size
	function resizeImage($resourceType,$image_width,$image_height,$resizeWidth,$resizeHeight) {
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
	}
	public function thumb($dirPath,$new_width,$new_height){
		$imageProcess = false;
		$fileName = $this->tmp;
		$sourceProperties = getimagesize($fileName);
		$sourceImageWidth = $sourceProperties[0];
		$sourceImageHeight = $sourceProperties[1];
		$uploadImageType = $sourceProperties[2];
		$fileExt = pathinfo($this->nom, PATHINFO_EXTENSION);
		switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName);
                $imageLayer = $this->resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                imagejpeg($imageLayer,$dirPath.$this->nom);
								$imageProcess = true;
                break;

            case IMAGETYPE_GIF:
                $resourceType = imagecreatefromgif($fileName);
                $imageLayer = $this->resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                imagegif($imageLayer,$dirPath.$this->nom);
								$imageProcess = true;
                break;

            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName);
                $imageLayer = $this->resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
                imagepng($imageLayer,$dirPath.$this->nom);
								$imageProcess = true;
                break;

            default:
                $imageProcess = false;
                break;
        }
				return $imageProcess;
	}
	public function uploadfichier($rep,$taille,$resize=null,$new_width=null,$new_height=null){
		$this->dir = $rep; // change the current directory
		$ext = pathinfo($this->nom); //get the file infos
		if(is_null($resize)){
			if (empty($this->nom)){
				$this->error = "err0";
				return false;
			}else if (!in_array($ext['extension'],$this->extValides)){ //check Size
				$this->error = "err3";
				return false;
			}else if (!in_array($this->type,$this->typesValides)){ //check extension
				$this->error = "err1";
				return false;
			}else if ($this->taille > $taille){ //check Size
				$this->error = "err2";
				return false;
			}else if (!move_uploaded_file($this->tmp , $this->dir.$this->nom)){ //upload the file
				$this->error = "err4";
				return false;
			}else{
				return true;
			}
	}else {
		if (empty($this->nom)){
			$this->error = "err0";
			return false;
		}else if (!in_array($ext['extension'],$this->extValides)){ //check Size
			$this->error = "err3";
			return false;
		}else if (!in_array($this->type,$this->typesValides)){ //check extension
			$this->error = "err1";
			return false;
		}else if ($this->taille > $taille){ //check Size
			$this->error = "err2";
			return false;
		}else if (!$this->thumb($this->dir,$new_width,$new_height)){ //upload the file
			$this->error = "err4";
			return false;
		}else{
			return true;
		}
	}
	}
	public function uploaderror(){
		return $this->error ;
	}
}
Class Error{
	public function alert($type, $msg){
		if($type == 'success')
		echo '<div class="alert alert-success alert-success-style1 alert-success-stylenone">
				<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
<span class="icon-sc-cl" aria-hidden="true">&times;</span>
</button>
				<i class="fa fa-check edu-checked-pro admin-check-sucess admin-check-pro-none" aria-hidden="true"></i>
				<p class="message-alert-none"><strong> Success !</strong> '.$msg.'.</p>
		</div>';
		if($type == 'error')
		echo '<div class="alert alert-danger alert-mg-b alert-success-style4 alert-success-stylenone">
				<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
<span class="icon-sc-cl" aria-hidden="true">&times;</span>
</button>
<i class="fa fa-exclamation-triangle edu-warning-danger admin-check-pro admin-check-pro-none" aria-hidden="true"></i>
				<p class="message-alert-none"><strong> Error ! </strong> '.$msg.'.</p>
		</div>';
	}
	public function alertbig($type, $msg){
		if($type == 'success')
		echo '<div class="alert alert-success alert-dismissible" role="alert">
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		    </button>
		  <h4 class="alert-heading">Success !</h4>
		  <hr>
		  <p class="mb-0">'.$msg.'.</p>
		</div>';
		if($type == 'error')
		echo '<div class="alert alert-danger alert-dismissible" role="alert">
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		    </button>
		  <h4 class="alert-heading">Erreur !</h4>
		  <hr>
		  <p class="mb-0">'.$msg.'.</p>
		</div>';
		if($type == 'info')
		echo '<div class="alert alert-info alert-dismissible" role="alert">
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		    </button>
		  <h4 class="alert-heading">Information !</h4>
		  <hr>
		  <p class="mb-0">'.$msg.'.</p>
		</div>';
	}
	public function changedate($str){
		$datetab = explode('.', $str);
		$mois = array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
		return $datetab[0]." ".$mois[$datetab[1]-1]." ".$datetab[2];
	}
	public function counter($id, $jsonf, $hidden=null){

		$json = file_get_contents($jsonf);
		$json = json_decode($json, true);
		if(is_null($json[$id])){
			$json[$id] = "0";
			file_put_contents($jsonf, json_encode($json));
		}
		$json[$id]++;
		file_put_contents($jsonf, json_encode($json));
		if(is_null($hidden)){
			echo $json[$id];
		}
	}
}

?>
