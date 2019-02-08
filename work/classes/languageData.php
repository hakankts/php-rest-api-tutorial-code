<?php 

class languageData {
    
    public function lang()
    {

        $lang = array();

        if($_SESSION['lang'] =='TR'){
            
            $lang['project_name'] = "Hakan Karataş Rest Api Tutorial";

            $lang['name']           = "Ad";
            $lang['surname']        = "Soyad";
            $lang['update']         = "Düzenle";
            $lang['delete']         = "Sil";
            $lang['add']            = "Ekle";
            $lang['close']          = "Kapat";
            $lang['enter_name']     = "Ad giriniz";
            $lang['enter_surname']  = "Soyad giriniz";
            $lang['added']          = "Eklendi";
            $lang['updated']        = "Güncellendi";
            $lang['deleted']        = "Data Silindi";
            $lang['sure']           = "Emin misiniz?";
            $lang['nodata']         = "Data Bulunamadı";
            $lang['login_failure']  = "Güvenli Giriş başarısız.";            
            
        }

        if($_SESSION['lang'] =='EN'){
            
            $lang['project_name'] = "Hakan Karataş Rest Api Tutorial";
            
            $lang['name']           = "Name";
            $lang['surname']        = "Surname";
            $lang['update']         = "Edit";
            $lang['delete']         = "Delete";
            $lang['add']            = "Add";
            $lang['close']          = "Close";
            $lang['enter_name']     = "Enter Name";
            $lang['enter_surname']  = "Enter Surname";
            $lang['added']          = "Added";
            $lang['updated']        = "Updated";
            $lang['deleted']        = "Data Deleted";
            $lang['sure']           = "Are you sure?";
            $lang['nodata']         = "No Data Found";
            $lang['login_failure']  = "Login Failure.";     
        }

        return $lang;
    }

}

?>