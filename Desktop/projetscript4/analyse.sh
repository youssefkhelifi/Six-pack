#!/bin/bash

help_file="HELP.txt"    #enregistrement du path du fichier text.txt dans "help_file" 



show_usage()
{
echo "analyse.sh: [-h] [-v] [-t] [-m] [-G] [-v] [-n] [-p] user.."
}




HELP()
{
cat $help_file    
echo -e "\n"
}





HELPYAD(){

text=$(cat $help_file)                                 
yad --title="Help" --center --no-buttons  --text="$text"  

}





count_users()
{
echo -e "\e[1;92mLe nombre d’utilisateurs est: \e[0m"  
cat /etc/passwd | wc -l   
}





show_home_directory()
{

echo -e "\e[1;92mNoms des utilisateurs suivis par leurs répertoires personnels:\e[0m\n"

cut -d ":" -f 1,6 /etc/passwd     
}



author()
{


version=$(cat /etc/issue | rev | cut -c 6- | rev)                        #enregistrement de la version dans "version"

echo -e "\e[1;92m Auteurs: \e[0mjawher & youssef "  
echo -e "\e[1;92m Version du code: \e[0m$version"                        


}


show_users_inGroup()
{




while read line; do

if [[ "$(cut -d: -f 1 <<< "$line")" = "$1" ]];then
	var=$(echo $line | cut -d ":" -f 3)     
fi
done < "/etc/group" 




if [[  -z  $var  ]];then 

echo "Ce group n'existe pas!"

else 
	echo -e "\e[1;92mUtilisateurs qui ont $1 comme groupe primaire:\e[0m"

	test=false


	while read line; do

	if [[ "$(cut -d: -f 4 <<< "$line")" = "$var" ]];then
		echo $line | cut -d ":" -f 1               
		test=true
	fi
	done < "/etc/passwd"


	if [ $test != true ];then   
	
	echo -e "Il n'y a aucun utilisateur qui a $1 comme groupe primaire\n"
	
	fi


fi
}

userType()
{



while read line; do

if [[ "$(cut -d: -f 1 <<< "$line")" = "$1" ]];then     
	userID=$(echo $line | cut -d ":" -f 3);    
fi

done < "/etc/passwd"




if [[ ! -z  $userID  ]];then 


	if [ $userID == 0 ];then
	echo -e "C'est un utilisateur \e[1;92madmin\e[0m "
	

	else if [[ $userID -lt 1000 && $userID -gt 0 ]];then
	echo -e "C'est un utilisateur \e[1;92mapplicatif\e[0m "
	
	
	else if [ $userID -ge 1000 ];then
	echo -e "C'est un utilisateur \e[1;92msimple\e[0m"
	fi
	fi
	fi

else  

echo -e "Cet utilisateur n'existe pas!"

fi


}








menu_textuel()
{
while (true)
	do 
		echo -e "\n"
		echo "+++++++++++++++++++++++ Menu ++++++++++++++++++++++++"
		echo "1)  : Afficher le nombre d’utilisateurs"
		echo "2)  : Afficher les répertoires personnels des utilisateurs"
		echo "3)  : Utilisateurs appartenant au même groupe"
		echo "4)  : Afficher le nom des auteurs et la version du code"
		echo "5)  : Afficher le Type de l’utilisateurs"
		echo "6)  : Help"
		echo "0)  : Quit"
		echo "+++++++++++++++++++++++++++++++++++++++++++++++++++++"

		echo "Entrez votre choix : "
		read choix
		case $choix in

				1)
		clear
		count_users
				;;
				2)
		clear
		show_home_directory	
				;;
				3)
		clear
		echo "Donnez le nom du groupe:"
		read nom
		clear
		show_users_inGroup $nom
				;;

				4)
		clear
		author
				;;

				5)
		clear
		echo "Donnez le nom de l'utilisateur:"
		read nom
		clear
		userType $nom
			
				;;

				6)
		clear
		HELP
				;;
					
				0)
		clear
		echo "Au revoir $USER"
				exit
				;;

				*)
		clear
		echo "Mauvais choix"		 			
			
				;;
		esac
	done

}

