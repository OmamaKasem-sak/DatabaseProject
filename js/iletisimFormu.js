function formKontrol(){
	
	var isim = document.getElementById("ad").value;
	var soyisim = document.getElementById("soyad").value;
	var mail = document.getElementById("email").value;
	var cepTelefonu = document.getElementById("telefon").value;
	var message = document.getElementById("mesaj").value;
	var check = document.getElementById("check");
	var erkek = document.getElementById("erkek");
	var kadin = document.getElementById("kadın");
	var cinsiyet = document.getElementById("cinsiyet");
	var dogum = document.getElementById("dogum").value;
	var mailkontrol = /^([a-zA-Z0-9\.-]+)@([a-zA-Z0-9-]+).([a-z]{2,10})(.[a-z]{2,8})$/;
	var isimkontrol = /^([a-zA-Z]+)$/;
	var telefonkontrol = /^0([0-9]{10})$/;
	var kontrol1 = new Boolean(true);
	var kontrol2 = new Boolean(true);
	var kontrol3 = new Boolean(true);
	var kontrol4 = new Boolean(true);
	var kontrol5 = new Boolean(true);
	var kontrol6 = new Boolean(true);
	var kontrol7 = new Boolean(true);
	var kontrol8 = new Boolean(true);

	if (mailkontrol.test(mail))
	{
		document.getElementById("mailKontrol").style.display="none"; 
	}
	else {
		document.getElementById("mailKontrol").style.display="block"; 
		document.getElementById("mailKontrol").innerHTML="Geçersiz mail adresi.";
		kontrol1 = false;

	}

	if (isim == "" || isim == null || isim.length < 2 || isimkontrol.test(isim)==false){
		kontrol2 = false;
		document.getElementById("adKontrol").style.display="block"; 
		document.getElementById("adKontrol").innerHTML="Geçersiz isim.";
	}
	else
		document.getElementById("adKontrol").style.display="none"; 


	if (soyisim == "" || soyisim == null || soyisim.length < 2 || isimkontrol.test(soyisim)==false) {
		kontrol3 = false;
		document.getElementById("soyadKontrol").style.display="block"; 
		document.getElementById("soyadKontrol").innerHTML="Geçersiz soyisim.";
	}
	else
		document.getElementById("soyadKontrol").style.display="none"; 


	if (message == "" || message == null ) {
		kontrol4 = false;
		document.getElementById("mesajKontrol").style.display="block"; 
		document.getElementById("mesajKontrol").innerHTML="Mesaj kısmı boş olmamalıdır.";
	}
	else
		document.getElementById("mesajKontrol").style.display="none"; 


	if (telefonkontrol.test(cepTelefonu)==false) {
		kontrol5 = false;
		document.getElementById("telefonKontrol").style.display="block"; 
		document.getElementById("telefonKontrol").innerHTML="Geçersiz telefon başında 0 olmak üzere 11 haneli olmalıdır.";
	}
	else
		document.getElementById("telefonKontrol").style.display="none"; 


	if (check.checked == false) {
		kontrol6 = false;
		document.getElementById("sartKontrol").style.display="block"; 
		document.getElementById("sartKontrol").innerHTML="Şartları kabul edin kutucuğu seçilmelidir.";
	}
	else
		document.getElementById("sartKontrol").style.display="none"; 


	if (erkek.checked == true) {
		document.getElementById("cinsiyet").innerHTML="Erkek";
		document.getElementById("cinsiyetKontrol").style.display="none"; 
	}
	else if (kadin.checked == true) {
		document.getElementById("cinsiyet").innerHTML="Kadın";
		document.getElementById("cinsiyetKontrol").style.display="none"; 
	}
	else {
		kontrol7 = false;
		document.getElementById("cinsiyetKontrol").style.display="block"; 
		document.getElementById("cinsiyetKontrol").innerHTML="Cinsiyet seçilmelidir.";
	}


	if (dogum=="" || dogum == null) {
		kontrol8 = false;
		document.getElementById("dogumKontrol").style.display="block"; 
		document.getElementById("dogumKontrol").innerHTML="Doğum tarihi doldurulmalıdır.";
	}
	else
		document.getElementById("dogumKontrol").style.display="none";


	if (kontrol1 && kontrol2 && kontrol3 && kontrol4 && kontrol5 && kontrol6 && kontrol7 && kontrol8) {
		document.iletisimFormu.action = "iletisimBilgi.php";
		document.iletisimFormu.submit();
	}

}  