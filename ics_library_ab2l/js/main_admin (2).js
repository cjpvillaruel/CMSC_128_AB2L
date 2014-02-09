
$(".collap-links").click(function (){
$(this).next().slideToggle("slow");
var string = $(this).children("a").text();
if(string == "HIDE"){
	$(this).children("a").text("VISIBLE");
}
else{
$(this).children("a").text("HIDE");
}
});
