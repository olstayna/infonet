var data=[];
nome=[];
cpf=[];
cnpj=[];
tipo=[];
cep=[];
tel=[];
i=0;
j=0;
texto="";

function verificar(i,t){

var v = i.value;

if(isNaN(v[v.length-1])){
   i.value = v.substring(0, v.length-1);
   return;
}

if(t == "data"){
   i.setAttribute("maxlength", "10");
   if (v.length == 2 || v.length == 5) i.value += "/";
}

if(t == "cpf"){
   i.setAttribute("maxlength", "14");
   if (v.length == 3 || v.length == 7) i.value += ".";
   if (v.length == 11) i.value += "-";
}

if(t == "cnpj"){
   i.setAttribute("maxlength", "18");
   if (v.length == 2 || v.length == 6) i.value += ".";
   if (v.length == 10) i.value += "/";
   if (v.length == 15) i.value += "-";
}

if(t == "cep"){
   i.setAttribute("maxlength", "9");
   if (v.length == 5) i.value += "-";
}

if(t == "tel"){
   if(v[0] == 9){
      i.setAttribute("maxlength", "10");
      if (v.length == 5) i.value += "-";
   }else{
      i.setAttribute("maxlength", "9");
      if (v.length == 4) i.value += "-";
   }
}
}

function ver()
{
if (fo.opcao.value=="fisica")
{document.getElementById("fx").style.display = "block";  // aparece 
document.getElementById("jx").style.display = "none";  // desaparece 

}

if (fo.opcao.value=="juridica")
{document.getElementById("jx").style.display = "block";  // aparece 
document.getElementById("fx").style.display = "none";  // desaparece 

}

}
function mostracad()
{
nome[i]=fo.txtnome.value;
data[i]=fo.txtdata.value;
if(fo.opcao.value=="fisica")
{
   tipo[i]="fisica";
   cpf[i]=fo.txtcpf.value;
}
else
{
   tipo[i]="juridica";
   cnpj[i]=fo.txtcnpj.value;
}
cep[i]=fo.txtcep.value;
tel[i]=fo.txttel.value;
i++;
fo.txtnome.value="";
fo.txtdata.value="";
fo.txtcpf.value="";
fo.txtcnpj.value="";
fo.txtcep.value="";
fo.txttel.value="";
alert("CADASTRO EFETUADO");

}

function mostralista()
{
texto=""
for(j=0;j!=i;j++)
{
   texto=texto+ " nome "+ nome[j]+ " data "+ data[j];
   if(tipo[j]=="fisica")
   {
      texto=texto+ " cpf "+ cpf[j];
   }
   else
   {
      texto=texto+ "cnpj "+ cnpj[j];

   }
   texto=texto+ " tipo "+ tipo[j]+ " cep "+ cep[j]+ " telefone "+ tel[j]+ "\n";
}

flista.lista.value=texto;

}