// $(document).ready(function () {
//     var app = {
//         show: function(){
//             loadSecret(0);
//         }
//     }
//     app.show();

// });
$(function(){
    $("#sectionsecret").onshow=
        loadSecret(0);

        $("#sectionactive").onshow=
        loadActive(0);        
    
});

function loadSecret($pagenumber){
    if($pagenumber==0){
        $pagenumber=1;
    }
    var $pageSize=20;
    var formData = {
        pageIndex: $pagenumber,
        pageSize:$pageSize
    };
    
    $.ajax({
        url: base_url + "/loadSecret",
        method: "GET",
        data:formData,
        success: function (response) {
            let reccount=response.record;
            let data=response.data;
            let pg=document.getElementById('pagingsecret');
            if(pg == null){
                return;
            }
            while (pg.hasChildNodes()) {
                pg.removeChild(pg.firstChild);
              }
            let pgsize=Math.ceil(reccount/$pageSize);
            for(let i=0;i<pgsize;i++){
                let pgel= document.createElement('li');
                pgel.className='page-item';
                
                if((i+1)==$pagenumber){
                    pgel.className='page-item active';
                }
                
                let pglink= document.createElement('a');
                pglink.className='page-link';
                pglink.href="javascript:loadSecret("+(i+1)+")";
                // pglink.onclick="loadSecret("+(i+1)+")";
                pglink.innerHTML=i+1;
                pgel.append(pglink);
                pg.append(pgel);
            }
            let pgel= document.createElement('li');
                pgel.className='page-item';
                let pglink= document.createElement('a');
                pglink.className='page-link';
                pglink.innerHTML=reccount + ' Record';
                pgel.append(pglink);
                pg.append(pgel);

            let gr=document.getElementById('jsGridsecret');
            while (gr.hasChildNodes()) {
                gr.removeChild(gr.firstChild);
              }
            data.forEach( (dt) => {
                
                    let div1 = document.createElement('div');
                    div1.classList.add('col-12');
                    div1.classList.add('col-sm-6');
                    div1.classList.add('col-md-4');
                    div1.classList.add('d-flex');
                    div1.classList.add('align-items-stretch');
                    div1.classList.add('flex-column');
                    
                    let div2 = document.createElement('div');
                    div2.classList.add('card');     
                    div2.classList.add('card-outline');
                    div2.classList.add('card-danger');           
                    div2.classList.add('bg-dark');
                    div2.classList.add('d-flex');
                    div2.classList.add('flex-fill');
                    
                    let divribbon = document.createElement('div');
                    divribbon.classList.add('ribbon-wrapper');                
                    divribbon.classList.add('ribbon-lg');
    
                    let divribbonfill = document.createElement('div');
                    divribbonfill.classList.add('ribbon');       
                    if(dt.profile=='Broadband_5mb_193'){
                        divribbonfill.classList.add('bg-primary');
                        divribbonfill.innerHTML='5 Mbps';
                    }   
                    if(dt.profile=='Broadband 10mb_194'){
                        divribbonfill.classList.add('bg-warning');
                        divribbonfill.innerHTML='10 Mbps';
                    }    
                    if(dt.profile=='Broadband 20mb_195'){
                        divribbonfill.classList.add('bg-success');
                        divribbonfill.innerHTML='20 Mbps';
                    }        
                    
                    divribbon.appendChild(divribbonfill);
                    div2.appendChild(divribbon);
    
                    let divtitle = document.createElement('div');
                    divtitle.classList.add('card-header');
                    // divtitle.classList.add('text-muted');
                    divtitle.classList.add('border-bottom');
                    // divtitle.classList.add('border-color-white');
                    
    
                    let title  = document.createTextNode(dt.name);
                    divtitle.appendChild(title);
    
                    let divbody = document.createElement('div');
                    divbody.classList.add('card-body');
                    divbody.classList.add('pt-0');
    
                    let divbodyrow = document.createElement('div');
                    divbodyrow.className='row';
    
                    let divbodycol = document.createElement('div');
                    divbodycol.className='col-10';
    
                    let divbodyisi = document.createElement('h2');
                    divbodyisi.className='lead';
    
                    // let divbodyisihead = document.createElement('b');
                    // divbodyisihead.innerHTML='172001011001';
                    // divbodyisi.appendChild(divbodyisihead);
    
                    let divbodyisilist = document.createElement('ul');
                    divbodyisilist.classList.add('ml-0');
                    divbodyisilist.classList.add('mb-0');
                    divbodyisilist.classList.add('fa-ul');
                    // divbodyisilist.classList.add('text-muted');
                    
                    let divbodyisilist1 = document.createElement('li');
                    divbodyisilist1.id="*1";
                    divbodyisilist1.innerHTML='.id : '+dt.id;
                    divbodyisilist.appendChild(divbodyisilist1);
    
                    let divbodyisilist2 = document.createElement('li');
                    divbodyisilist2.innerHTML='service : ' + dt.service;
                    divbodyisilist.appendChild(divbodyisilist2);
    
                    let divbodyisilist3 = document.createElement('li');
                    divbodyisilist3.innerHTML='profile : ' + dt.profile;
                    divbodyisilist.appendChild(divbodyisilist3);
    
                    let divbodyisilist4 = document.createElement('li');
                    divbodyisilist4.innerHTML='macaddress : ' + dt.macaddress;
                    divbodyisilist.appendChild(divbodyisilist4);
    
                    let divbodyisilist5 = document.createElement('li');
                    divbodyisilist5.innerHTML='disabled : ' + dt.disabled;
                    divbodyisilist.appendChild(divbodyisilist5);
    
                    let divbodyisilist6 = document.createElement('li');
                    divbodyisilist6.innerHTML='comment : ' + dt.comment;
                    divbodyisilist.appendChild(divbodyisilist6);                
    
                    // let divbodyfooter = document.createElement('div');
                    // divbodyfooter.classList.add('card-footer');
                    // divbodyfooter.classList.add('bg-black');
                    // // divbodyfooter.className='card-footer';
    
                    // let divbodyfooterisi = document.createElement('div');
                    // divbodyfooterisi.className='text-right';
    
                    // let divbodyfooterisibtn = document.createElement('button');
                    // divbodyfooterisibtn.classList.add('btn-sm');
                    // divbodyfooterisibtn.classList.add('btn-danger');
                    // let divbodyfooterisibtnicon = document.createElement('i');                
                    // divbodyfooterisibtnicon.classList.add('fas');
                    // divbodyfooterisibtnicon.classList.add('fa-cog');
                    
                    // divbodyfooterisibtn.appendChild(divbodyfooterisibtnicon);
                    // divbodyfooterisi.appendChild(divbodyfooterisibtn);
                    // divbodyfooter.appendChild(divbodyfooterisi);
    
                    divbodycol.appendChild(divbodyisi);
                    divbodycol.appendChild(divbodyisilist);
                    divbodyrow.appendChild(divbodycol);
                    divbody.appendChild(divbodyrow);
    
                    div2.appendChild(divtitle);
                    div2.appendChild(divbody);
                    // div2.appendChild(divbodyfooter);
                    div1.appendChild(div2);
                    
                    gr.appendChild(div1);
    
                
            });
        }
    });
}

function loadActive($pagenumber){
    if($pagenumber==0){
        $pagenumber=1;
    }
    var $pageSize=20;
    var formData = {
        pageIndex: $pagenumber,
        pageSize:$pageSize
    };
    
    $.ajax({
        url: base_url + "/loadActive",
        method: "GET",
        data:formData,
        success: function (response) {
            let reccount=response.record;
            let data=response.data;
            let pg=document.getElementById('pagingactive');
            if(pg == null){
                return;
            }
            while (pg.hasChildNodes()) {
                pg.removeChild(pg.firstChild);
              }
            let pgsize=Math.ceil(reccount/$pageSize);
            for(let i=0;i<pgsize;i++){
                let pgel= document.createElement('li');
                pgel.className='page-item';
                
                if((i+1)==$pagenumber){
                    pgel.className='page-item active';
                }
                
                let pglink= document.createElement('a');
                pglink.className='page-link';
                pglink.href="javascript:loadActive("+(i+1)+")";
                // pglink.onclick="loadActive("+(i+1)+")";
                pglink.innerHTML=i+1;
                pgel.append(pglink);
                pg.append(pgel);
            }
            let pgel= document.createElement('li');
                pgel.className='page-item';
                let pglink= document.createElement('a');
                pglink.className='page-link';
                pglink.innerHTML=reccount + ' Record';
                pgel.append(pglink);
                pg.append(pgel);

            let gr=document.getElementById('jsGridactive');
            while (gr.hasChildNodes()) {
                gr.removeChild(gr.firstChild);
              }
            data.forEach( (dt) => {
                
                    let div1 = document.createElement('div');
                    div1.classList.add('col-12');
                    div1.classList.add('col-sm-6');
                    div1.classList.add('col-md-4');
                    div1.classList.add('d-flex');
                    div1.classList.add('align-items-stretch');
                    div1.classList.add('flex-column');
                    
                    let div2 = document.createElement('div');
                    div2.classList.add('card');     
                    div2.classList.add('card-outline');
                    div2.classList.add('card-danger');           
                    div2.classList.add('bg-dark');
                    div2.classList.add('d-flex');
                    div2.classList.add('flex-fill');
                    
                    let divribbon = document.createElement('div');
                    divribbon.classList.add('ribbon-wrapper');                
                    divribbon.classList.add('ribbon-lg');
    
                    let divribbonfill = document.createElement('div');
                    divribbonfill.classList.add('ribbon');       
                    if(dt.profile=='Broadband_5mb_193'){
                        divribbonfill.classList.add('bg-primary');
                        divribbonfill.innerHTML='5 Mbps';
                    }   
                    if(dt.profile=='Broadband 10mb_194'){
                        divribbonfill.classList.add('bg-warning');
                        divribbonfill.innerHTML='10 Mbps';
                    }    
                    if(dt.profile=='Broadband 20mb_195'){
                        divribbonfill.classList.add('bg-success');
                        divribbonfill.innerHTML='20 Mbps';
                    }        
                    
                    divribbon.appendChild(divribbonfill);
                    div2.appendChild(divribbon);
    
                    let divtitle = document.createElement('div');
                    divtitle.classList.add('card-header');
                    // divtitle.classList.add('text-muted');
                    divtitle.classList.add('border-bottom');
                    // divtitle.classList.add('border-color-white');
                    
    
                    let title  = document.createTextNode(dt.name);
                    divtitle.appendChild(title);
    
                    let divbody = document.createElement('div');
                    divbody.classList.add('card-body');
                    divbody.classList.add('pt-0');
    
                    let divbodyrow = document.createElement('div');
                    divbodyrow.className='row';
    
                    let divbodycol = document.createElement('div');
                    divbodycol.className='col-10';
    
                    let divbodyisi = document.createElement('h2');
                    divbodyisi.className='lead';
    
                    // let divbodyisihead = document.createElement('b');
                    // divbodyisihead.innerHTML='172001011001';
                    // divbodyisi.appendChild(divbodyisihead);
    
                    let divbodyisilist = document.createElement('ul');
                    divbodyisilist.classList.add('ml-0');
                    divbodyisilist.classList.add('mb-0');
                    divbodyisilist.classList.add('fa-ul');
                    // divbodyisilist.classList.add('text-muted');
                    
                    let divbodyisilist1 = document.createElement('li');
                    divbodyisilist1.id="*1";
                    divbodyisilist1.innerHTML='.id : '+dt.id;
                    divbodyisilist.appendChild(divbodyisilist1);
    
                    let divbodyisilist2 = document.createElement('li');
                    divbodyisilist2.innerHTML='service : ' + dt.service;
                    divbodyisilist.appendChild(divbodyisilist2);
    
                    let divbodyisilist3 = document.createElement('li');
                    divbodyisilist3.innerHTML='address : ' + dt.address;
                    divbodyisilist.appendChild(divbodyisilist3);
    
                    let divbodyisilist4 = document.createElement('li');
                    divbodyisilist4.innerHTML='macaddress : ' + dt.macaddress;
                    divbodyisilist.appendChild(divbodyisilist4);
    
                    let divbodyisilist5 = document.createElement('li');
                    divbodyisilist5.innerHTML='uptime : ' + dt.uptime;
                    divbodyisilist.appendChild(divbodyisilist5);
    
                    let divbodyisilist6 = document.createElement('li');
                    divbodyisilist6.innerHTML='comment : ' + dt.comment;
                    divbodyisilist.appendChild(divbodyisilist6);                
    
                    // let divbodyfooter = document.createElement('div');
                    // divbodyfooter.classList.add('card-footer');
                    // divbodyfooter.classList.add('bg-black');
                    // // divbodyfooter.className='card-footer';
    
                    // let divbodyfooterisi = document.createElement('div');
                    // divbodyfooterisi.className='text-right';
    
                    // let divbodyfooterisibtn = document.createElement('button');
                    // divbodyfooterisibtn.classList.add('btn-sm');
                    // divbodyfooterisibtn.classList.add('btn-danger');
                    // let divbodyfooterisibtnicon = document.createElement('i');                
                    // divbodyfooterisibtnicon.classList.add('fas');
                    // divbodyfooterisibtnicon.classList.add('fa-cog');
                    
                    // divbodyfooterisibtn.appendChild(divbodyfooterisibtnicon);
                    // divbodyfooterisi.appendChild(divbodyfooterisibtn);
                    // divbodyfooter.appendChild(divbodyfooterisi);
    
                    divbodycol.appendChild(divbodyisi);
                    divbodycol.appendChild(divbodyisilist);
                    divbodyrow.appendChild(divbodycol);
                    divbody.appendChild(divbodyrow);
    
                    div2.appendChild(divtitle);
                    div2.appendChild(divbody);
                    // div2.appendChild(divbodyfooter);
                    div1.appendChild(div2);
                    
                    gr.appendChild(div1);
    
                
            });
        }
    });
}