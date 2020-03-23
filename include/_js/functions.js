function cadastrarForm() {
    document.location = 'cadastrar.php';
}

function cancelForm() {
    document.location = 'index.php';
}

function isNumber(str) {
    if (str.length == 0) {
        return false;
    }
    var numdecs = 0;
    for (i = 0; i < str.length; i++) {
        mychar = str.charAt(i);
        if ((mychar >= "0" && mychar <= "9") || mychar == ".") {
            if (mychar == ".") {
                numdecs++;
            }
        } else {
            return false;
        }
    }
    if (numdecs > 1) {
        return false;
    }
    return true;
}

function validaEmail(pStr, pFmt) {
    //var reEmail1 = /^[\w!#$%&'*+/=?^`{|}~-]+(\.[\w!#$%&'*+/=?^`{|}~-]+)*@(([\w-]+\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
    //var reEmail2 = /^[\w-]+(\.[\w-]+)*@(([\w-]{1,63}\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
    //var reEmail3 = /^[\w-]+(\.[\w-]+)*@(([A-Za-z\d][A-Za-z\d-]{0,61}[A-Za-z\d]\.)+[A-Za-z]{2,6}|\[\d{1,3}(\.\d{1,3}){3}\])$/;
    var reEmail4 = /^[a-z0-9.]+@[a-z0-9]+\.[a-z]+(\.[a-z]+)?$/;

    eval("reEmail = reEmail" + pFmt);
    if (reEmail.test(pStr)) {
        return true;
    } else if (pStr != null && pStr != "") {
        return false;
    }
}

function verTamanhoCampo(Obj, tam) {
    var NomeObj = new String(Obj.name);
    if (Obj.value.length > tam) {
        alert('O campo ' + NomeObj.toUpperCase() + ' deve ter até ' + tam + ' caracteres.');
        Obj.focus();
        if (Obj.type != 'select-one') {
            Obj.select();
        }
    }
}

function verForm(myForm) {
    var erro = false;
    var objeto;
    var mensagem = "Atenção:\nO cadastro de USUÁRIO tem os seguintes erros:\n";

    if (myForm.nome.value == "") {
        mensagem = mensagem + "\n - NOME está vazio";
        if (!erro) {
            objeto = myForm.nome;
        }
        erro = true;
    } else {
        if (myForm.nome.value.length <= 5) {
            mensagem = mensagem + "\n - NOME não está comleto";
            if (!erro) {
                objeto = myForm.nome;
            }
            erro = true;
        }
    }

    if (myForm.email.value == "") {
        mensagem = mensagem + "\n - E-MAIL está vazio";
        if (!erro) {
            objeto = myForm.email;
        }
        erro = true;
    } else {
        if (!validaEmail(myForm.email.value, 4)) {
            mensagem = mensagem + "\n - " + myForm.email.value + " Não é um endereço de e-mail válido";
            if (!erro) {
                objeto = myForm.email;
            }
            erro = true;
        }
    }

    if (myForm.idade.value == "") {
        mensagem = mensagem + "\n - IDADE está vazio";
        if (!erro) {
            objeto = myForm.idade;
        }
        erro = true;
    } else {
        if (!isNumber(myForm.idade.value)) {
            mensagem = mensagem + "\n - IDADE precisa ser numérico";
            if (!erro) {
                objeto = myForm.idade;
            }
            erro = true;
        }
    }

    if (!erro) {
        return true;
    } else {
        window.alert(mensagem);
        objeto.focus();
        if (objeto.type != 'select-one') {
            objeto.select();
        }
        return false;
    }
}