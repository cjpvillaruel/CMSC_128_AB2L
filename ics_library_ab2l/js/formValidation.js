	window.onload=function(){
	//	alert("HEYA POTATO");
	//			alert("Imma at formValidation.js");

				regForm.fname.onblur=validateFname;
				regForm.minit.onblur=validateMinitial;
				regForm.lname.onblur=validateLname;
				regForm.stdNum.onblur=validateNumber;
				//regForm.college.onblur=validateCollege;
				//regForm.course.onblur=validateCourse;
				//regForm.classi.onblur=validateClassification;
				regForm.eadd.onblur=validateEmail;
				regForm.uname.onblur=validateUser;
				regForm.pass.onblur=validatePass;
				regForm.cpass.onblur=validateCpass;
				regForm.onsubmit=validateAll;
			}
			
	function validateFname(){
		str=regForm.fname.value;
		msg="Invalid Input: ";
		
		if (str=="") msg+="First name is required!";
		else if (!str.match(/^[A-Z|a-z|\s]{3,50}$/))  msg+="Must be between 3-50 alpha character!<br/>";
		else if(msg="Invalid input") msg="";
		document.getElementsByName("valFname")[0].innerHTML=msg;
		if(msg=="") return true;
	}	
	function validateMinitial(){
		str=regForm.minit.value;
		msg="Invalid Input: ";
		
		if (str=="") msg+="Middle Initial is required!";
		else if (!str.match(/^[A-Z]{1,3}\.$/))  msg+="Must be between 1-3 capital alpha character ended by period!<br/>";
		else if(msg="Invalid input") msg="";
		document.getElementsByName("valInitial")[0].innerHTML=msg;
		if(msg=="") return true;
	}
	function validateLname(){
				str=regForm.lname.value;
				msg="Invalid Input: ";
				
				if (str=="") msg+="Last name is required!";
				else if (!str.match(/^[A-Z|a-z\s]{2,50}$/))  msg+="Must be between 2-50 alpha character!<br/>";
				else if(msg="Invalid input") msg="";
				document.getElementsByName("valLname")[0].innerHTML=msg;
				if(msg=="") return true;
			}
	function validateNumber(){
				str=regForm.stdNum.value;
				flag  = document.getElementById("classi").value;
				
				msg="Invalid Input: ";
				if(flag==="student"){
					if (str=="") msg+="Student number is required";
					else if (!str.match(/^[0-9]{4}\-[0-9]{5}$/))  msg+="Must be xxxx-xxxxx";
					else if(msg="Invalid input") msg="";
					document.getElementsByName("valNumber")[0].innerHTML=msg;
				}
				else{
					if (str=="") msg+="Employee number is required";
					else if (!str.match(/^[0-9]{10}$/) )  msg+="Must be xxxxxxxxxx";
					else if(msg="Invalid input") msg="";
					document.getElementsByName("valNumber")[0].innerHTML=msg;
				}
				if(msg=="") return true;
			}
	function validateCollege(){
				str=regForm.college.value;
				msg="Invalid Input: ";
				
				if (str=="") msg+="College is required!";
				else if (!str.match(/^[A-Z]{2,4}$/))  msg+="Must be an acronym!<br/>";
				else if(msg="Invalid input") msg="";
				document.getElementsByName("valCollege")[0].innerHTML=msg;
				if(msg=="") return true;
			}
	function validateCourse(){
				str=regForm.course.value;
				msg="Invalid Input: ";
				
				if (str=="") msg+="Course is required!";
				else if (!str.match(/^[A-Z]{4,8}$/))  msg+="Must be an acronym!<br/>";
				else if(msg="Invalid input") msg="";
				document.getElementsByName("valCourse")[0].innerHTML=msg;
				if(msg=="") return true;
			}
	function validateClassification(){
				str=regForm.classi.value;
				msg="Invalid Input: ";
				
				if (str=="") msg+="Classification is required!";
				else if (!str.match(/^(student|faculty)$/))  msg+="Must be a student or faculty!<br/>";
				else if(msg="Invalid input") msg="";
				document.getElementsByName("valClass")[0].innerHTML=msg;
				if(msg=="") return true;
			}	
			
	function validateEmail(){
				str=regForm.eadd.value;
				msg="Invalid Input: ";
			
				if (str=="") msg+="Email is required!";
				else if (!str.match(/^(\w|\.){6,30}\@([0,9]|[a-z]|[A-Z]){3,}\./))  msg+="Must be in the form: name@domain.extension!<br/>";
				else if(msg="Invalid input") msg="";
				document.getElementsByName("valEmail")[0].innerHTML=msg;
				if(msg=="") return true;
			}
	function validateUser(){
				str=regForm.uname.value;
				msg="Invalid Input: ";
				
				if (str=="") msg+="Username is required!";
				else if (!str.match(/^[A-Z|a-z|0-9]{3,20}$/))  msg+="Must be between 3-20 alpha numeric character!<br/>";
				else if(msg="Invalid input") msg="";
				document.getElementsByName("valUser")[0].innerHTML=msg;
				if(msg=="") return true;
			}
	
	function validatePass(){
				str=regForm.pass.value;
				msg="";

				if (str=="") msg+="Password is required!";
				else if (str.match(/^([a-z]+|\d+)$/))  msg+="Invalid Input: Strength: Weak";
				else if (str.match(/^[a-zA-z]+$/))  msg+="Invalid Input: Strength: Medium";
				else if (str.match(/^[a-zA-z0-9]+$/))  msg+="Strength: Strong";
				else if(msg="") msg="";
				document.getElementsByName("valPass")[0].innerHTML=msg;
				if(msg=="Strength: Strong") return true;
		}		
	function validateCpass(){
			str=regForm.pass.value;
			str2=regForm.cpass.value;
			msg="Invalid Input: ";
			
			if(str2=="") msg+="Confirmation of password is required!";
			else if (str2!=str){
				msg+="Password Mismatch"
			}
			else if(msg="") msg="";
			document.getElementsByName("valCpass")[0].innerHTML=msg;
			return true;
		}
	function validateAll(){
		if(validateFname()&&validateMinitial()&&validateLname()&&validateNumber()&&/*validateCollege()&&validateCourse()&&
		   validateClassification()&&*/validateEmail()&&validateUser()&&validatePass()&&validateCpass())
		{
			return true;
		}
		else{return false;}
	}	