<?php 


    function upload($tmp_name, $userfile)
    {

        $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/'.SITE_PATH.UPLOADS_PATH;
        $uploadfile = $uploaddir . $userfile;

        $result = validation(dirname(UPLOADS_PATH), 'd');
        if ( $result === true )
        {
            if ( !file_exists($userfile) )
            {
                if ( move_uploaded_file($tmp_name, $uploadfile) ) 
                {
                    chmod($target, CHMOD_MASK);
                } 
                else 
                {
                    $result = FILE_NOT_SAVE;
                }
            } 
            else 
            {
                $result = FILE_IS_EXIST;
            }
        }
        var_dump($result);
        return $result;
    }
    
    function delete($file_name)
    {
        $file_path = $_SERVER['DOCUMENT_ROOT'].'/'.SITE_PATH.UPLOADS_PATH.$file_name;
        $result = validation($file_path, 'f');
        if ( $result === true )
        {
            $result = unlink($file_path);
        }
        return $result;
    }

    function info($path)
    {  
        if (validation($path, 'd') === true)
        {
            $list = array_diff(scandir($path), array('..', '.'));
            $result = array();
            $num = 1;
            foreach ($list as $file) 
            {
                $item = array(
                    'num' => $num++,
                    'file_name' => $file,
                    'file_size' => convertSize(filesize($path . $file))
                );
                array_push($result, $item);
            }
        }
        else 
        {
            return false;
        }
        return $result;
    }

    function convertSize($size)
    {
        if ($size > 125000) 
        {
            $size = floor($size / 125000) . 'MB';
        } 
        else if ($size > 1024) 
        {
            $size = floor($size / 1024) . 'KB';
        } 
        else 
        {
            $size = $size.'B';
        }
        return $size;
    }
    
    // First argue it is PATH
    // Second argue:
    // File = f
    // Directory = d
    function validation($path, $file_or_dir) 
    {
        if ( ($file_or_dir == 'd') && !is_dir($path) ) 
        {
            return FOLDER_NOT_EXIST;
        }
        elseif ( ($file_or_dir == 'f') && !is_file($path) ) 
        {
            return FILE_NOT_EXIST;
        }
        else if ( !file_exists($path) )
        {
            return FILE_IS_EXIST;
        }
        else if ( !is_writable($path) )
        {
            return DONT_HAVE_PERMITIONS;
        }
        else if ( !is_readable($path) ) 
        {
            return NO_READABLE;
        } 
        else {
            return true;
        }
    }

?>