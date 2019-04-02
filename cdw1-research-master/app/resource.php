<?php 

class Resource 
{	
	public function dirToArray($dir)
	{ 
		$filelist = array();
		try{
				if($handle = opendir($dir)) 
				{

					while($entry = readdir($handle))
					{

						if(!in_array($entry,array(".","..")))
						{
							
							$dir2 = $dir.'/'.$entry;
							if(is_dir($dir2))
							{
								$filelist[] = $entry;

								if($handle2 = opendir($dir2))
								{

										while($entry2 = readdir($handle2))
										{
											if(!in_array($entry2,array(".",".."))){
												$filelist[$entry][] = $entry2;
											}
										}
								
								}
				
								closedir($handle2);

							}
							else
							{
								$filelist[] = $entry;
							}

						}
					}
				}
				closedir($handle);
			}catch(Exception $e)
			{
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		
		return $filelist;
	} 

	public function rename($oldName, $newName){
		
		$changeOld = str_replace(chr(92), chr(47), $oldName);
		$changeNew = str_replace(chr(92), chr(47), $newName);
		if(rename($changeOld, $changeNew))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}