<?php
// File Upload Function


function upload($input, $dir, $file, $extns, $maxsize) {
	$msg = NULL;
	$rc = 0;
	if (isset($_FILES[$input]['tmp_name'])) {
		if (is_uploaded_file($_FILES[$input]['tmp_name'])) {
			$fn = $_FILES[$input]['name'];
			$ext = trim(strtolower(strrchr($fn, '.')));
			if (!in_array($ext, $extns)) 
				{$msg = "Invalid File Type"; $rc = 10;}
			if ($_FILES[$input]['size'] > $maxsize) 
				{$msg = "Uploaded file size [" . $_FILES[$input]['size'] . "] exceeds limit [$maxsize]"; $rc = 11;}
			if (substr($dir, -1, 1) != '/') $dir .= '/';
			if (!is_dir($dir)) 
				{$msg = "Invalid Directory [$dir]"; $rc = 13;}
			$savefile = $dir . strtolower($file) . $ext;
			if ($rc == 0) {
				$result = move_uploaded_file($_FILES[$input]['tmp_name'], $savefile);
				if ($result > 1)
					{$msg = "Move Uploaded File Failed"; $rc = $result;}
				}
			}
		else {$msg = "No Uploaded File"; $rc = 12;}
		}
	else {$msg = "No Uploaded File"; $rc = 12;}
	
	if ($rc == 0) 	return(array($rc, $savefile));
	else 			return(array($rc, $msg));
	}
?>