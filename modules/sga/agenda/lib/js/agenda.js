var AGEN_PATH = "?redir=modules/sga/agenda/";
var Agenda = function() {

    var self = this;
    var date;

    this.update = function() {


        var ajaxList = new AjaxList();
        ajaxList.add(ajax);

        ajaxList.loadURLs();
    }

    this.refresh = function() {
        self.update();
        setInterval(self.update, 3000);
    }
}

Agenda.criar_agen = function(){

    var sucesso = function() {
        window.showInfoDialog('Agenda criada com sucesso.');
    }

    var form = document.getElementById('frm_criar_agenda');
    var p = new Object();
    var itens = "";

    var listaMarcados = document.getElementsByTagName("INPUT");  
    for (i = 0; i < listaMarcados.length; i++) {  
        var item = listaMarcados[i];  
        if (item.type == "checkbox" && item.checked) {  
            itens += item.id;  
            itens +=", ";
        }  
    }

    var dias_semana = itens.substr(0,itens.length -2);

    var dias =  dias_semana.split(",");

    for(i = 0; i < dias.length; i++){

        p['dias_semana'] = dias[i];

        var dados = p['dias_semana'].split('_');        
        if (dados[3] == ''){
            Ajax.simpleLoad(AGEN_PATH + "acoes/criar_agenda.php", "", "POST", Ajax.encodePostParameters(p), true);
        } 

    }



}