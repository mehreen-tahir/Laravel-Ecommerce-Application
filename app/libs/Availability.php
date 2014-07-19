<?php 
class Availability 
{
	public static function display($aval)
	{
		if($aval==0)
		{
			echo "Out of stock";
		}
		else if($aval==1)
		{
			echo "In stock";
		}
	}

	public static function displayClass($aval)
		{
			if($aval==0)
			{
				echo "outofstock";
			}
			else if($aval==1)
			{
				echo "instock";
			}
		}
}