function stateload(){
    var xhr = new XMLHttpRequest();
    xhr.open("POST",'stateload.php');
    xhr.responseType = "text";
    xhr.onload = function(){
		str = xhr.response;
		const result = str.split(',');
		document.getElementById('filename').value = result[0];
		document.getElementById('pages').value = result[1];
		document.getElementById('start').value = result[2];
		document.getElementById('lines').value = result[3];
    }
    xhr.send();

}

function resettxt(){
	document.getElementById('pages').value = 1;
	document.getElementById('start').value = 1;
	document.getElementById('lines').value = 10;
}

function ziporrar(){
	statesave();
    const form = document.getElementById('filename').value;
    const test = form.substr( -3 );
    switch (test){
        case 'zip':
            zipopen();
            break;
        case 'rar':
            raropen();
            break;
		case 'txt':
			txtopen();
			break;
        default:
            document.getElementById('pics').innerHTML = "it's not zip or rar";

    }
};

function statesave(){
	const form = document.getElementById('form');
	const sendform = new FormData(form);
	var xhr = new XMLHttpRequest();
	xhr.open ("POST",'statesave.php');
	xhr.responseType = "text";
	xhr.send(sendform);
}


function raropen(){
    const form = document.getElementById('form');
    const sendform = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST",'rar_open.php');
    xhr.responseType = "blob";
    xhr.onload = function(){
        var oURL = URL.createObjectURL(xhr.response);
        document.getElementById('pics').innerHTML = "<img src=" + oURL + "></img>";
    }
    xhr.send(sendform);
};

function zipopen(){
    const form = document.getElementById('form');
    const sendform = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST",'zip_open.php');
    xhr.responseType = "blob";
    xhr.onload = function(){
        var oURL = URL.createObjectURL(xhr.response);
        document.getElementById('pics').innerHTML = "<img src=" + oURL + "></img>";
    }
    xhr.send(sendform);

};

function txtopen(){
    const form = document.getElementById('form');
	var radioNodeList = form.txt_hv;
	var horv = radioNodeList.value;
    const sendform = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open("POST",'txt_open.php');
    xhr.responseType = "text";
    xhr.onload = function(){
		switch(horv){
			case 'h':
			console.log('h');
			document.getElementById('pics').innerHTML = "<div class=texts>" + xhr.response + "</div>";
			break;
			case 'v':
			console.log('v');
			document.getElementById('pics').innerHTML = "<div class=texts style=\"-ms-writing-mode: tb-rl; writing-mode: vertical-rl;\">" + xhr.response + "</div>";
			break;
		}
    }
    xhr.send(sendform);
}

function fnext(){
    const nowpage = document.getElementById('pages').value;
    nextpage = Number(nowpage) + 1;
    document.getElementById('pages').value = nextpage;
	const nowline = document.getElementById('start').value;
	const lines = document.getElementById('lines').value;
    nextline = Number(nowline) + Number(lines) -1;
    document.getElementById('start').value = nextline;
    ziporrar();
}

function fprev(){
    const nowpage = document.getElementById('pages').value;
    prevpage = Number(nowpage) - 1;
    document.getElementById('pages').value = prevpage;
	const nowline = document.getElementById('start').value;
	const lines = document.getElementById('lines').value;
    nextline = Number(nowline) - Number(lines) +1;
    document.getElementById('start').value = nextline;
    ziporrar();
}

function tnext(){
    const nowline = document.getElementById('start').value;
    nextline = Number(nowline)  + Number(lines);
    document.getElementById('start').value = nextline;
    ziporrar();
}

function tprev(){
    const nowline = document.getElementById('start').value;
    prevline = Number(nowline) - Number(lines);
    document.getElementById('start').value = prevline;
    ziporrar();
}