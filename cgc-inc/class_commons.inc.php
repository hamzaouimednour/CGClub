<?php
/* About : Class Manager */
class WebMaster{
    public $_db;

    public function setdb(PDO $db){
        $this->_db = $db ;
    }
    public function __construct($db){
        $this->setdb($db);
    }
    public function count($table, $c){
        $nbr = $this->_db->query("SELECT COUNT(".$c.") FROM ".$table);
        $nbr = $nbr->fetch(PDO::FETCH_NUM);
        return $nbr[0];
    } //
    public function sqlcount($table, $pk, $c, $test){
        $nbr = $this->_db->query("SELECT COUNT($pk) FROM ".$table." WHERE $c = '".$test."'");
        $nbr = $nbr->fetch(PDO::FETCH_NUM);
        return $nbr[0];
    }
    public function add_admin(AdminCgc $n){
        try{
            $sql = "INSERT INTO cgc_admin (email,nom ,pwd ,level) VALUES (:email ,:nom ,:pwd ,:level)";
            $exec = $this->_db->prepare($sql);
            $exec->bindValue(':email',$n->getemail());
            $exec->bindValue(':nom',$n->getnom());
            $exec->bindValue(':pwd',$n->getpwd());
            $exec->bindValue(':level',$n->getlevel());
            if($exec->execute()) return true;
        }catch(PDOException $error){
            return false;
        }
        $dbconn = null;
    }
    public function add_inscription(InscriptionCgc $n){
        try{
            $sql = "INSERT INTO cgc_inscription (email,event_id) VALUES (:email ,:event_id)";
            $exec = $this->_db->prepare($sql);
            $exec->bindValue(':email',$n->getemail());
            $exec->bindValue(':event_id',$n->getnom());
            if($exec->execute()) return true;
        }catch(PDOException $error){
            return false;
        }
        $dbconn = null;
    }
    public function add_book(BookCgc $n){
        try{
            $sql = "INSERT INTO cgc_books (title ,photo ,description, author,link ,date_book,id_category,active) VALUES (:title ,:photo ,:description ,:author ,:link ,:date_book,:id_category,:active)";
            $exec = $this->_db->prepare($sql);
            $exec->bindValue(':title',$n->gettitle());
            $exec->bindValue(':photo',$n->getphoto());
            $exec->bindValue(':description',$n->getdescription());
            $exec->bindValue(':author',$n->getauthor());
            $exec->bindValue(':link',$n->getlink());
            $exec->bindValue(':date_book',$n->getdate_book());
            $exec->bindValue(':id_category',$n->getid_category());
            $exec->bindValue(':active',$n->getactive());
            if($exec->execute()) return true;
        }catch(PDOException $error){
            return false;
        }
        $dbconn = null;
    }
    public function add_category(CategoryCgc $n){
        try{
            $sql = "INSERT INTO cgc_category (title, active) VALUES (:title, :active)";
            $exec = $this->_db->prepare($sql);
            $exec->bindValue(':title',$n->gettitle());
            $exec->bindValue(':active',$n->getactive());
            if($exec->execute()) return true;
        }catch(PDOException $error){
            return false;
        }
        $dbconn = null;
    }

    public function add_event(EventCgc $n){
        try{
            $sql = "INSERT INTO cgc_events (title ,photo ,description ,date_event, prix, active) VALUES (:title ,:photo ,:description ,:date_event,:prix,:active)";
            $exec = $this->_db->prepare($sql);
            $exec->bindValue(':title',$n->gettitle());
            $exec->bindValue(':photo',$n->getphoto());
            $exec->bindValue(':description',$n->getdescription());
            $exec->bindValue(':date_event',$n->getdate_event());
            $exec->bindValue(':prix',$n->getprix());
            $exec->bindValue(':active',$n->getactive());
            if($exec->execute()) return true;
        }catch(PDOException $error){
            return false;
        }
        $dbconn = null;
    }
    public function add_member(MemberCgc $n){
        try{
            $sql = "INSERT INTO cgc_members (email,nom ,tel ,filiere) VALUES (:email ,:nom ,:tel ,:filiere)";
            $exec = $this->_db->prepare($sql);
            $exec->bindValue(':email',$n->getemail());
            $exec->bindValue(':nom',$n->getnom());
            $exec->bindValue(':tel',$n->gettel());
            $exec->bindValue(':filiere',$n->getfiliere());
            if($exec->execute()) return true;
        }catch(PDOException $error){
            return false;
        }
        $dbconn = null;
    }
    public function add_news(NewsCgc $n){
        try{
            $sql = "INSERT INTO cgc_news (title ,photo ,photo2 ,description ,tags ,date_news, active) VALUES (:title ,:photo, :photo2 ,:description ,:tags ,:date_news, :active)";
            $exec = $this->_db->prepare($sql);
            $exec->bindValue(':title',$n->gettitle());
            $exec->bindValue(':photo',$n->getphoto());
            $exec->bindValue(':photo2',$n->getphoto2());
            $exec->bindValue(':description',$n->getdescription());
            $exec->bindValue(':tags',$n->gettags());
            $exec->bindValue(':date_news',$n->getdate_news());
            $exec->bindValue(':active',$n->getactive());
            if($exec->execute()) return true;
        }catch(PDOException $error){
            return false;
        }
        $dbconn = null;
    }
    public function add_contact(ContactCgc $n){
        try{
            $sql = "INSERT INTO cgc_contact (nom_prenom ,sender_email ,sujet ,msg, date_msg, send_ip) VALUES (:nom_prenom ,:sender_email ,:sujet ,:msg, :date_msg, :send_ip)";
            $exec = $this->_db->prepare($sql);
            $exec->bindValue(':nom_prenom',$n->getnom_prenom());
            $exec->bindValue(':sender_email',$n->getsender_email());
            $exec->bindValue(':sujet',$n->getsujet());
            $exec->bindValue(':msg',$n->getmsg());
            $exec->bindValue(':date_msg',$n->getdate_msg());
            $exec->bindValue(':send_ip',$n->getsend_ip());
            if($exec->execute()) return true;
        }catch(PDOException $error){
            return false;
        }
        $dbconn = null;
    }

#
# View Class Section
#
	public function view_books($id=null){
			$tab = array();
			if(is_null($id))
			   $req = $this->_db->query("SELECT * FROM cgc_books order by id desc");
			else
			   $req = $this->_db->query("SELECT * FROM cgc_books WHERE id = ".$id);
        if(!empty($req)){
			while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
					$books = new BookCgc($ligne);
					$books->bookItem($ligne);
					$tab[] = $books;
			}
			return $tab;
        }else {
            return false;
        }
	}
	public function view_inscription($row=null, $id=null){
			$tab = array();
			if(is_null($id))
			   $req = $this->_db->query("SELECT * FROM cgc_inscription");
			else
			   $req = $this->_db->query("SELECT * FROM cgc_inscription WHERE $row = ".$id);
			while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
					$books = new InscriptionCgc($ligne);
					$books->inscriptionItem($ligne);
					$tab[] = $books;
			}
			return $tab;
	}
  public function view_news($id=null){
			$tab = array();
			if(is_null($id))
			   $req = $this->_db->query("SELECT * FROM cgc_news order by date_news  DESC");
			else
			   $req = $this->_db->query("SELECT * FROM cgc_news WHERE id = ".$id);
        if(!empty($req)){
			while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
					$news = new NewsCgc($ligne);
					$news->newsItem($ligne);
					$tab[] = $news;
			}
			return $tab;
        }else {
            return false;
        }
	}
  public function view_events($id=null){
      $tab = array();
      if(is_null($id))
         $req = $this->_db->query("SELECT * FROM cgc_events order by id");
      else
         $req = $this->_db->query("SELECT * FROM cgc_events WHERE id = ".$id);
      while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
          $event = new EventCgc($ligne);
          $event->eventItem($ligne);
          $tab[] = $event;
      }
      return $tab;
  }
  public function view_members($email=null){
      $tab = array();
      if(is_null($email))
         $req = $this->_db->query("SELECT * FROM cgc_members");
      else
         $req = $this->_db->query("SELECT * FROM cgc_members WHERE lower(email) = lower('".$email."')");
    if(!empty($req)){
      while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
          $member = new MemberCgc($ligne);
          $member->memberItem($ligne);
          $tab[] = $member;
      }
      return $tab;
    }else {
        return false;
    }
  }
  public function view_contact($id=null){
      $tab = array();
      if(is_null($id))
         $req = $this->_db->query("SELECT * FROM cgc_contact order by date_msg");
      else
         $req = $this->_db->query("SELECT * FROM cgc_contact WHERE id = ".$id);
      while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
          $contact = new ContactCgc($ligne);
          $contact->contactItem($ligne);
          $tab[] = $contact;
      }
      return $tab;
  }
  public function view_category($id=null){
      $tab = array();
      if(is_null($id))
         $req = $this->_db->query("SELECT * FROM cgc_category order by id");
      else
         $req = $this->_db->query("SELECT * FROM cgc_category WHERE id = ".$id);
    if(!empty($req)){
        while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
            $category = new CategoryCgc($ligne);
            $category->categoryItem($ligne);
            $tab[] = $category;
        }
        return $tab;
    }else {
        return false ;
    }
  }
  public function view_admin($email=null){
      $tab = array();
      if(is_null($email))
         $req = $this->_db->query("SELECT * FROM cgc_admin ORDER BY del");
      else
         $req = $this->_db->query("SELECT * FROM cgc_admin WHERE email = '".$email."'");
      while($ligne = $req->fetch(PDO::FETCH_ASSOC)){
          $admin = new AdminCgc($ligne);
          $admin->adminItem($ligne);
          $tab[] = $admin;
      }
      return $tab;
  }

  #
  # </End View Class Section>
  #

  #
  # <Start Chek/Update Class Section>
  #
    public function check_login($email, $pass){
		$log = $this->_db->query("SELECT * FROM cgc_admin WHERE email = '".$email."' and pwd = '".$pass."' LIMIT 1");
		if($log->fetch(PDO::FETCH_ASSOC)) return true;
		else  return false;
    }
    public function sqlview($table,$column,$id){
		$data = $this->_db->query("SELECT * FROM `".$table."` WHERE `".$column."` = '".$id."'");
		 return $data->fetch(PDO::FETCH_ASSOC);
	}
    public function sqlselect($table,$extra=null){
        $tab = array();
        if(is_null($extra))
		    $data = $this->_db->query("SELECT * FROM `$table`");
        else
            $data = $this->_db->query("SELECT * FROM `$table` $extra");
        while($ligne = $data->fetch(PDO::FETCH_ASSOC)){
            $tab[] = $ligne;
        }
        return $tab;
	}
	public function exist($table,$column,$id){
			$data = $this->_db->query("SELECT * FROM `".$table."` WHERE `".$column."` = '".$id."'");
			if($data->fetch(PDO::FETCH_ASSOC)) return true;
			 else return false;
		}
	public function resetai($table){
		$this->_db->exec("ALTER TABLE `".$table."` AUTO_INCREMENT = 1");
	}
	public function update_book(BookCgc $n){
		if(empty($n->_photo))
					$sql = "UPDATE cgc_books SET title = :title ,	description = :description, author = :author, link = :link,date_book= :date_book ,	id_category= :id_category , active= :active WHERE id = :id";
		else
					$sql = "UPDATE cgc_books SET title= :title ,photo= :photo,	description= :description,author = :author,link=	:link ,date_book= :date_book , id_category= :id_category,  active= :active WHERE id= :id";
		$exec = $this->_db->prepare($sql);
		$exec->bindValue(':title',$n->gettitle());
		$exec->bindValue(':description',$n->getdescription());
        $exec->bindValue(':author',$n->getauthor());
		if(!empty($n->_photo))
      $exec->bindValue(':photo',$n->getphoto());		//cant bind it when no image sent
    $exec->bindValue(':link',$n->getlink());
    $exec->bindValue(':date_book',$n->getdate_book());
    $exec->bindValue(':id_category',$n->getid_category());
    $exec->bindValue(':active',$n->getactive());
    $exec->bindValue(':id',$n->getid());
		if($exec->execute()) return true;
	}
  public function update_news(NewsCgc $n){
		if(empty($n->_photo) and empty($n->_photo2))
			$sql = "UPDATE cgc_news SET title = :title , description = :description, tags= :tags, date_news= :date_news, active= :active  WHERE id = :id";
		elseif(!empty($n->_photo) and empty($n->_photo2))
            $sql = "UPDATE cgc_news SET title= :title ,photo= :photo, description= :description, tags= :tags, date_news= :date_news, active= :active WHERE id= :id";
		elseif(empty($n->_photo) and !empty($n->_photo2))
            $sql = "UPDATE cgc_news SET title= :title ,photo2= :photo2, description= :description, tags= :tags, date_news= :date_news, active= :active WHERE id= :id";
		else
			$sql = "UPDATE cgc_news SET title= :title ,photo= :photo, photo2= :photo2, description= :description, tags= :tags, date_news= :date_news, active= :active WHERE id= :id";
		$exec = $this->_db->prepare($sql);
		$exec->bindValue(':title',$n->gettitle());
		$exec->bindValue(':description',$n->getdescription());
        $exec->bindValue(':tags',$n->gettags());
		if(!empty($n->_photo))
            $exec->bindValue(':photo',$n->getphoto());		//cant bind it when no image sent
		if(!empty($n->_photo2))
            $exec->bindValue(':photo2',$n->getphoto2());		//cant bind it when no image sent
    $exec->bindValue(':date_news',$n->getdate_news());
    $exec->bindValue(':active',$n->getactive());
    $exec->bindValue(':id',$n->getid());
		if($exec->execute()) return true;
	}
  public function update_events(EventCgc $n){
    if(empty($n->_photo))
          $sql = "UPDATE cgc_events SET title = :title ,	description = :description,date_event= :date_event,prix= :prix, active= :active  WHERE id = :id";
    else
          $sql = "UPDATE cgc_events SET title= :title ,photo= :photo,	description= :description,date_event= :date_event,prix= :prix, active= :active WHERE id= :id";
    $exec = $this->_db->prepare($sql);
    $exec->bindValue(':title',$n->gettitle());
    $exec->bindValue(':description',$n->getdescription());
    if(!empty($n->_photo))
      $exec->bindValue(':photo',$n->getphoto());		//cant bind it when no image sent
    $exec->bindValue(':date_event',$n->getdate_event());
    $exec->bindValue(':prix',$n->getprix());
    $exec->bindValue(':active',$n->getactive());
    $exec->bindValue(':id',$n->getid());
    if($exec->execute()) return true;
  }
	public function update_category(CategoryCgc $a){
		$sql = "UPDATE cgc_category SET title= :title, active= :active WHERE id= :id";
		$exec = $this->_db->prepare($sql);
		$exec->bindValue(':title',$a->gettitle());
    $exec->bindValue(':active',$a->getactive());
		$exec->bindValue(':id',$a->getid());
		if($exec->execute()) return true;
	}
	public function update_admin(AdminCgc $a){
		$sql = "UPDATE cgc_admin SET pwd= :pwd ,	nom= :nom , level=:level WHERE email = :email";
		$exec = $this->_db->prepare($sql);
		$exec->bindValue(':pwd',$a->getpwd());
		$exec->bindValue(':email',$a->getemail());
		$exec->bindValue(':nom',$a->getnom());
		$exec->bindValue(':level',$a->getlevel());
		if($exec->execute()) return true;
	}
  public function update_logadmin(AdminCgc $a){
		$sql = "UPDATE cgc_admin SET last_log=:last_log,log_ip=:log_ip WHERE email = :email";
		$exec = $this->_db->prepare($sql);
		$exec->bindValue(':email',$a->getemail());
    $exec->bindValue(':last_log',$a->getlast_log());
    $exec->bindValue(':log_ip',$a->getlog_ip());
		if($exec->execute()) return true;
	}
  public function update_member(MemberCgc $a){
		$sql = "UPDATE cgc_members SET nom= :nom , tel=:tel, filiere=:filiere WHERE email = :email";
		$exec = $this->_db->prepare($sql);
    $exec->bindValue(':nom',$a->getnom());
    $exec->bindValue(':tel',$a->gettel());
		$exec->bindValue(':email',$a->getemail());
		$exec->bindValue(':filiere',$a->getfiliere());
		if($exec->execute()) return true;
	}
	public function del($tab, $column, $id){
    if(is_numeric($id))
			$del = $this->_db->exec("DELETE FROM `".$tab."` WHERE `".$column."` = ".$id);
    else
      $del = $this->_db->exec("DELETE FROM `".$tab."` WHERE `".$column."` = '".$id."'");
			if($del) return true;
			else  return false;
	}
}


?>
