    var ajaxku;
    function ajaxkota(id){
        ajaxku = buatajax();
        var url="../lokasi/getByProp/"+id;
        ajaxku.onreadystatechange=stateChanged;
        ajaxku.open("GET",url,true);
        ajaxku.send(null);
    }

    function ajaxkec(id){
        ajaxku = buatajax();
        var url="../lokasi/getByPropKot/"+id+"/"+$("#prop").val();
        ajaxku.onreadystatechange=stateChangedKec;
        ajaxku.open("GET",url,true);
        ajaxku.send(null);
    }

    function ajaxkel(id){
        ajaxku = buatajax();
        var url="../lokasi/getByPropKotKec/"+$("#prop").val()+"/"+$("#kota").val()+"/"+id;
        ajaxku.onreadystatechange=stateChangedKel;
        ajaxku.open("GET",url,true);
        ajaxku.send(null);
    }

    var ajaxku;
    function ajaxkota2(id){
        ajaxku = buatajax();
        var url="../../lokasi/getByProp/"+id;
        ajaxku.onreadystatechange=stateChanged;
        ajaxku.open("GET",url,true);
        ajaxku.send(null);
    }

    function ajaxkec2(id){
        ajaxku = buatajax();
        var url="../../lokasi/getByPropKot/"+id+"/"+$("#prop").val();
        ajaxku.onreadystatechange=stateChangedKec;
        ajaxku.open("GET",url,true);
        ajaxku.send(null);
    }

    function ajaxkel2(id){
        ajaxku = buatajax();
        var url="../../lokasi/getByPropKotKec/"+$("#prop").val()+"/"+$("#kota").val()+"/"+id;
        ajaxku.onreadystatechange=stateChangedKel;
        ajaxku.open("GET",url,true);
        ajaxku.send(null);
    }

    function buatajax(){
        if (window.XMLHttpRequest){
            return new XMLHttpRequest();
        }
        if (window.ActiveXObject){
            return new ActiveXObject("Microsoft.XMLHTTP");
        }
        return null;
    }
    function stateChanged(){
        var data;
        if (ajaxku.readyState==4){
            data=ajaxku.responseText;
            if(data.length>=0){
                document.getElementById("kota").innerHTML = data
            }else{
                document.getElementById("kota").value = "<option selected>Pilih Kota/Kab</option>";
            }
        }
    }

    function stateChangedKec(){
        var data;
        if (ajaxku.readyState==4){
            data=ajaxku.responseText;
            if(data.length>=0){
                document.getElementById("kec").innerHTML = data
            }else{
                document.getElementById("kec").value = "<option selected>Pilih Kecamatan</option>";
            }
        }
    }

    function stateChangedKel(){
        var data;
        if (ajaxku.readyState==4){
            data=ajaxku.responseText;
            if(data.length>=0){
                document.getElementById("kel").innerHTML = data
            }else{
                document.getElementById("kel").value = "<option selected>Pilih Kelurahan/Desa</option>";
            }
        }
    }