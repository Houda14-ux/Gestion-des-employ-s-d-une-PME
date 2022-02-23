<?php
    function connet(){
        //$link = mysqli_connect("localhost", "mysql_user", "mysql_password") or die("Impossible de se connecter : " . mysql_error());
        $connection = mysqli_connect("localhost", "root","","employe_pme")  or die("Impossible de se connecter");
        return $connection;
    }

    function executer(){
        $query = "select * from employe";
        if( isset( $_GET['recherche'] ) && !empty( $_GET['recherche'] ) ){
            $query = "select * from employe where nom like '%{$_GET['recherche']}%'";
        }
        $lien = connet();
        $result = mysqli_query( $lien , $query);
        //var_dump( $lien , $result ) ; //Console.log
        return $result;
    }
    function afficher_info($mat){
        $query = "select * from employe where Matricule = '$mat';";
        $lien = connet();
        $result = mysqli_query( $lien , $query);
        return $result->fetch_object();
    }

    function ajouter(){
        $photo = '';
        if( isset($_FILES['Photo']) == true && $_FILES['Photo']['size'] > 0 ){
            $photo = ",'". 'images/'.$_POST['Matricule'].'.png'."'";
        }
        
        $query ="INSERT INTO employe (Matricule, Nom, Prenom, Date, Departement, Salaire, Fonction, Photo) 
                VALUES ('{$_POST['Matricule']}', '{$_POST['Nom']}', '{$_POST['Prenom']}', '{$_POST['date']}', 
                '{$_POST['Departement']}','{$_POST['Salaire']}', '{$_POST['Fonction']}' $photo)";
        $lien = connet();
        $result = mysqli_query( $lien , $query);

        if(!empty($result) && isset($_FILES['Photo']) == true && $_FILES['Photo']['size'] > 0 ){
            move_uploaded_file( $_FILES['Photo']['tmp_name'] , 'images/'.$_POST['Matricule'].'.png' );
        }
        header(('Location:index.php'));
    }
    function modifier(){
        $photo = '';
        if( isset($_FILES['Photo']) == true && $_FILES['Photo']['size'] > 0 ){
            $photo = ",Photo = '". 'images/'.$_POST['Matricule'].'.png'."'";
        }
        $query ="UPDATE employe set Nom = '{$_POST['Nom']}', Prenom = '{$_POST['Prenom']}', Date = '{$_POST['date']}',
            Departement='{$_POST['Departement']}', Salaire='{$_POST['Salaire']}', 
            Fonction='{$_POST['Fonction']}' $photo
            where Matricule = '{$_POST['Matricule']}'";
            
        $lien = connet();
        $result = mysqli_query( $lien , $query);

        if( !empty($result) && isset($_FILES['Photo']) == true && $_FILES['Photo']['size'] > 0 ){
            if( is_file( 'images/'.$_POST['Matricule'].'.png' ) ){
                unlink( 'images/'.$_POST['Matricule'].'.png' );
            }
            move_uploaded_file( $_FILES['Photo']['tmp_name'] , 'images/'.$_POST['Matricule'].'.png' );
        }
        //exit($result);
        header(('Location:index.php'));
    }

    function supprimer(){
        $query ="DELETE from employe where Matricule = '{$_GET['matr']}'";
        $lien = connet();
        $result = mysqli_query( $lien , $query);
        header(('Location:index.php'));
    }

?>
 