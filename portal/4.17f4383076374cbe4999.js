(window.webpackJsonp=window.webpackJsonp||[]).push([[4],{zLOC:function(t,e,n){"use strict";n.r(e),n.d(e,"StoriesModule",function(){return y});var i=n("ofXK"),r=n("bTqV"),o=n("tk/3"),s=n("fXoL");let c=(()=>{class t{constructor(t){this._http=t,this.url="/api/",this.post={id:1,image:"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI42EURKpMnIUrahX-tVHbgZGYaBbN1W7eQ&usqp=CAU",name:"Arvind Kumar",story_count:4,story_img:"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJI42EURKpMnIUrahX-tVHbgZGYaBbN1W7eQ&usqp=CAU",date_time:"1 hr ago"}}uploadStory(t){return this._http.post(this.url+"addStory.php",t,{reportProgress:!0,observe:"events",headers:new o.d({"ngsw-bypass":"true"})})}getStories(t,e){return this._http.post(this.url+"singleStory.php",{id:t,start:e})}}return t.\u0275fac=function(e){return new(e||t)(s.Wb(o.a))},t.\u0275prov=s.Jb({token:t,factory:t.\u0275fac,providedIn:"root"}),t})();var a=n("tyNb");function g(t,e){if(1&t){const t=s.Tb();s.Sb(0,"main"),s.Sb(1,"form"),s.Sb(2,"label",2),s.Sb(3,"div",3),s.Ac(4,"+ add story"),s.Rb(),s.Rb(),s.Sb(5,"input",4),s.Zb("change",function(e){return s.sc(t),s.dc().storyUpload(e)}),s.Rb(),s.Rb(),s.Rb()}}function d(t,e){if(1&t){const t=s.Tb();s.Sb(0,"button",9),s.Zb("click",function(){return s.sc(t),s.dc(2).addStory()}),s.Ac(1,"save"),s.Rb()}}function b(t,e){if(1&t&&(s.Sb(0,"button",10),s.Ac(1),s.Rb()),2&t){const t=s.dc(2);s.Cb(1),s.Cc("",t.uploadingProgress," %")}}function u(t,e){if(1&t&&(s.Sb(0,"div",5),s.Sb(1,"section"),s.Sb(2,"article"),s.zc(3,d,2,0,"button",6),s.zc(4,b,2,1,"button",7),s.Rb(),s.Ob(5,"img",8),s.Rb(),s.Rb()),2&t){const t=s.dc();s.vc("background:url(",t.imgsrc,") no-repeat; background-size:cover;background-position: center;"),s.Cb(3),s.ic("ngIf",!t.uploading),s.Cb(1),s.ic("ngIf",t.uploading),s.Cb(1),s.ic("src",t.imgsrc,s.tc)}}function p(t,e){if(1&t&&s.Ob(0,"td",10),2&t){const t=e.index,n=s.dc();s.wc("background",t==n.start?"red":"white")}}const h=function(){return[]},l=function(t){return["/profile",t]},f=function(){return{refresh:!1}},m=[{path:"add",component:(()=>{class t{constructor(t){this._stories=t,this.imgsrc="",this.uploading=!1,this.file=null,this.uploadingProgress=0,this.mydata=JSON.parse(localStorage.getItem("user"))}ngOnInit(){}storyUpload(t){if(this.file=t.target.files[0],t.target.files&&t.target.files[0]){const e=t.target.files[0],n=new FileReader;n.onload=t=>this.imgsrc=n.result,n.readAsDataURL(e)}}addStory(){this.uploading=!0;const t=new Date,e=t.getDate().toString()+t.getMonth().toString()+t.getFullYear().toString()+t.getHours().toString()+t.getMinutes().toString()+t.getSeconds().toString()+"-"+this.file.name,n=new FormData;n.append("myid",this.mydata.userid),n.append("file",this.file,e),this._stories.uploadStory(n).subscribe(t=>{if(this.ev=t,t.type===o.c.UploadProgress){let t=Math.round(100*this.ev.loaded/this.ev.total);this.uploadingProgress=t,100==t&&(this.imgsrc="",this.uploadingProgress=0,this.uploading=!1,alert("uploaded.."))}},t=>{alert("error")})}}return t.\u0275fac=function(e){return new(e||t)(s.Nb(c))},t.\u0275cmp=s.Hb({type:t,selectors:[["app-add"]],decls:2,vars:2,consts:[[4,"ngIf"],["class","imgPre",3,"style",4,"ngIf"],["for","file"],[1,"add","selectBtn"],["type","file","id","file","name","file","accept",".jpg,.png,.jpeg,.gif",2,"display","none",3,"change"],[1,"imgPre"],["mat-button","",3,"click",4,"ngIf"],["mat-button","",4,"ngIf"],[3,"src"],["mat-button","",3,"click"],["mat-button",""]],template:function(t,e){1&t&&(s.zc(0,g,6,0,"main",0),s.zc(1,u,6,6,"div",1)),2&t&&(s.ic("ngIf",!e.imgsrc),s.Cb(1),s.ic("ngIf",e.imgsrc))},directives:[i.j,r.b],styles:["main[_ngcontent-%COMP%]{height:100%;background:#eee;box-sizing:border-box;display:flex;justify-content:center;align-items:center}.add[_ngcontent-%COMP%]{--mycolor:green;padding:10px 20px;border:1px inset var(--mycolor);border-radius:4px;color:var(--mycolor)}.add[_ngcontent-%COMP%]:hover{box-shadow:2px 2px 5px green}.imgPre[_ngcontent-%COMP%]{height:100%;box-sizing:border-box}.imgPre[_ngcontent-%COMP%]   img[_ngcontent-%COMP%]{max-width:100%;max-height:100%;box-shadow:1px 1px 10px grey}article[_ngcontent-%COMP%]{margin:5px;color:#fff;position:fixed;top:0;right:0}.imgPre[_ngcontent-%COMP%]   section[_ngcontent-%COMP%]{-webkit-backdrop-filter:blur(4px);backdrop-filter:blur(4px);display:flex;justify-content:center;align-items:center;height:100%;box-sizing:border-box;background:#000000b3;padding:35px}"]}),t})()},{path:":id",component:(()=>{class t{constructor(t,e,n){this.stories=t,this._router=e,this._activatedRoute=n,this.start=0,this.data=[],this.full="/api/story/"}ngOnInit(){this._activatedRoute.paramMap.subscribe(t=>{this.id=t.get("id"),this.getData()})}getData(){this.stories.getStories(this.id,this.start).subscribe(t=>{this.data=t,this.name=this.data.name,this.image=this.data.image,this.story_img=this.data.story_img,this.story_count=+this.data.story_count})}next(t){this.story_count===this.start+1&&this._router.navigate(["/post"],{state:{refresh:!1}}),0===t?0!=this.start&&(this.start-=1):(this.start+=1,this.getData())}}return t.\u0275fac=function(e){return new(e||t)(s.Nb(c),s.Nb(a.d),s.Nb(a.a))},t.\u0275cmp=s.Hb({type:t,selectors:[["app-view"]],decls:17,vars:13,consts:[[1,"left",3,"touchend"],[1,"right",3,"touchend"],[1,"imgPre"],[1,"counts"],["width","100%"],["class","count",3,"background",4,"ngFor","ngForOf"],["width","50px"],["mat-icon-button","",3,"routerLink","state"],["alt","",3,"src"],[3,"src"],[1,"count"]],template:function(t,e){1&t&&(s.Sb(0,"div",0),s.Zb("touchend",function(){return e.next(0)}),s.Rb(),s.Sb(1,"div",1),s.Zb("touchend",function(){return e.next(1)}),s.Rb(),s.Sb(2,"div",2),s.Sb(3,"div",3),s.Sb(4,"table",4),s.Sb(5,"tr"),s.zc(6,p,1,2,"td",5),s.Rb(),s.Rb(),s.Rb(),s.Sb(7,"article"),s.Sb(8,"table"),s.Sb(9,"tr"),s.Sb(10,"td",6),s.Sb(11,"a",7),s.Ob(12,"img",8),s.Rb(),s.Rb(),s.Sb(13,"td"),s.Ac(14),s.Rb(),s.Rb(),s.Rb(),s.Rb(),s.Sb(15,"section"),s.Ob(16,"img",9),s.Rb(),s.Rb()),2&t&&(s.Cb(2),s.vc("background:url(",e.full+e.story_img,") no-repeat; background-size:cover;background-position: center;"),s.Cb(4),s.ic("ngForOf",s.lc(9,h).constructor(e.story_count)),s.Cb(5),s.ic("routerLink",s.mc(10,l,e.id))("state",s.lc(12,f)),s.Cb(1),s.kc("src","/api/image/",e.image,"",s.tc),s.Cb(2),s.Cc(" ",e.name," "),s.Cb(2),s.kc("src","api/story/",e.story_img,"",s.tc))},directives:[i.i,r.a,a.e],styles:[".left[_ngcontent-%COMP%], .right[_ngcontent-%COMP%]{position:fixed;width:50%;height:100%;z-index:10}.right[_ngcontent-%COMP%]{right:0}.imgPre[_ngcontent-%COMP%]{-webkit-user-select:none;user-select:none;height:100%;box-sizing:border-box}.imgPre[_ngcontent-%COMP%]   section[_ngcontent-%COMP%]   img[_ngcontent-%COMP%]{max-width:100%;max-height:100%;box-shadow:1px 1px 10px grey}.imgPre[_ngcontent-%COMP%]   section[_ngcontent-%COMP%]{-webkit-backdrop-filter:blur(4px);backdrop-filter:blur(4px);display:flex;justify-content:center;align-items:center;height:100%;box-sizing:border-box;background:#000000b3;padding:35px}.imgPre[_ngcontent-%COMP%]   article[_ngcontent-%COMP%]   img[_ngcontent-%COMP%]{width:40px;height:40px;border-radius:50%}.imgPre[_ngcontent-%COMP%]   article[_ngcontent-%COMP%]{padding:5px;color:#fff;position:fixed;top:0;z-index:11}.counts[_ngcontent-%COMP%]{position:fixed;top:0;width:100%;height:3px;z-index:5}.count[_ngcontent-%COMP%]{background:#fff}"]}),t})()}];let x=(()=>{class t{}return t.\u0275fac=function(e){return new(e||t)},t.\u0275mod=s.Lb({type:t}),t.\u0275inj=s.Kb({imports:[[a.f.forChild(m)],a.f]}),t})(),y=(()=>{class t{}return t.\u0275fac=function(e){return new(e||t)},t.\u0275mod=s.Lb({type:t}),t.\u0275inj=s.Kb({providers:[c],imports:[[i.b,x,r.c,o.b]]}),t})()}}]);