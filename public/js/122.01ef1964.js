(globalThis["webpackChunkclinica"]=globalThis["webpackChunkclinica"]||[]).push([[122],{122:(l,e,a)=>{"use strict";a.r(e),a.d(e,{default:()=>I});a(6809);var o=a(2852),t=a(3100),n=a(5124),r=a(1952),u=a.n(r),s=(a(1286),a(5475)),c=a(4004),i=a(99);const d=(0,i.nY)("data",{state:()=>({sucursal:{nombre:"Seleccione una unidad médica",id:0},sucursales:[],mostrarSucursal:!0}),actions:{setSucursal(l){this.sucursal=l},setSucursales(l){this.sucursales=l},setMostrarSucursal(l){this.mostrarSucursal=l}}});var b=a(4975),g=a(2836);const f=["src"],p={key:1,src:u()},k={__name:"MainLayout",setup(l){const e=(0,n.KR)("https://wifisesa.sispro.mx/"),a=(0,c.A)(),r=(d(),(0,b.n)()),u=((0,n.KR)(!0),(0,g.rd)()),i=JSON.parse(localStorage.user);function k(){a.loading.show()}function m(){a.loading.hide()}function _(){let l=null!=localStorage.configuration?JSON.parse(localStorage.configuration):null;null!=l&&r.setConfiguration(l)}function h(){localStorage.clear(),u.push({name:"login",params:{}})}return s.emitter.on("before-request",(l=>{k()})),s.emitter.on("after-response",(l=>{m()})),(0,o.sV)((()=>{_()})),(l,a)=>{const u=(0,o.g2)("q-avatar"),s=(0,o.g2)("q-tab"),c=(0,o.g2)("q-tabs"),d=(0,o.g2)("q-space"),b=(0,o.g2)("q-item-label"),g=(0,o.g2)("q-item-section"),k=(0,o.g2)("q-item"),m=(0,o.g2)("q-list"),_=(0,o.g2)("q-btn-dropdown"),q=(0,o.g2)("q-toolbar"),A=(0,o.g2)("q-header"),F=(0,o.g2)("router-view"),C=(0,o.g2)("q-page-container"),y=(0,o.g2)("q-layout"),Q=(0,o.gN)("close-popup");return(0,o.uX)(),(0,o.Wv)(y,{class:"shadow-2",style:(0,t.Tr)(`color: ${(0,n.R1)(r).configuration.text_color}; background-color: ${(0,n.R1)(r).configuration.primary_color}`)},{default:(0,o.k6)((()=>[(0,o.bF)(A,{class:"q-pt-sm",outlined:"",style:(0,t.Tr)(`background-color:${(0,n.R1)(r).configuration.header_color}`)},{default:(0,o.k6)((()=>[(0,o.bF)(q,null,{default:(0,o.k6)((()=>[(0,o.bF)(u,{size:"36px",class:"q-ml-lg q-mr-lg"},{default:(0,o.k6)((()=>[(0,n.R1)(r).configuration.logo?((0,o.uX)(),(0,o.CE)("img",{key:0,src:`${e.value}/${(0,n.R1)(r).configuration.logo}`},null,8,f)):((0,o.uX)(),(0,o.CE)("img",p))])),_:1}),(0,o.bF)(c,{"no-caps":"",modelValue:l.tab,"onUpdate:modelValue":a[1]||(a[1]=e=>l.tab=e),"inline-label":"","indicator-color":"blue"},{default:(0,o.k6)((()=>[(0,o.bF)(s,{name:"dashboard",style:(0,t.Tr)(`color: ${(0,n.R1)(r).configuration.text_color}`),label:"Dashboard",onClick:a[0]||(a[0]=e=>l.$router.push({name:"Dashboard.index"}))},null,8,["style"])])),_:1},8,["modelValue"]),(0,o.bF)(d),(0,o.bF)(_,{flat:"",label:(0,n.R1)(i).name,style:(0,t.Tr)(`color: ${(0,n.R1)(r).configuration.text_color}`),"no-caps":""},{default:(0,o.k6)((()=>[(0,o.bF)(m,null,{default:(0,o.k6)((()=>[(0,o.bo)(((0,o.uX)(),(0,o.Wv)(k,{clickable:"",onClick:l.onItemClick},{default:(0,o.k6)((()=>[(0,o.bF)(g,null,{default:(0,o.k6)((()=>[(0,o.bF)(b,null,{default:(0,o.k6)((()=>[(0,o.eW)("Perfil")])),_:1})])),_:1})])),_:1},8,["onClick"])),[[Q]]),(0,o.bo)(((0,o.uX)(),(0,o.Wv)(k,{clickable:"",onClick:a[2]||(a[2]=e=>l.$router.push({name:"configuration.index"}))},{default:(0,o.k6)((()=>[(0,o.bF)(g,null,{default:(0,o.k6)((()=>[(0,o.bF)(b,null,{default:(0,o.k6)((()=>[(0,o.eW)("Configuración")])),_:1})])),_:1})])),_:1})),[[Q]]),(0,o.bo)(((0,o.uX)(),(0,o.Wv)(k,{clickable:"",onClick:a[3]||(a[3]=l=>h())},{default:(0,o.k6)((()=>[(0,o.bF)(g,null,{default:(0,o.k6)((()=>[(0,o.bF)(b,null,{default:(0,o.k6)((()=>[(0,o.eW)("Cerrar sesión")])),_:1})])),_:1})])),_:1})),[[Q]])])),_:1})])),_:1},8,["label","style"])])),_:1})])),_:1},8,["style"]),(0,o.bF)(C,null,{default:(0,o.k6)((()=>[(0,o.bF)(F,{class:"q-pr-xl q-pl-xl q-pt-xl"})])),_:1})])),_:1},8,["style"])}}};var m=a(9915),_=a(8351),h=a(8593),q=a(2287),A=a(2979),F=a(5415),C=a(9055),y=a(6694),Q=a(192),S=a(9091),v=a(3656),x=a(4701),R=a(7984),T=a(1056),$=a(7231),w=a(1082),W=a.n(w);const X=k,I=X;W()(k,"components",{QLayout:m.A,QHeader:_.A,QToolbar:h.A,QAvatar:q.A,QTabs:A.A,QTab:F.A,QSpace:C.A,QBtnDropdown:y.A,QList:Q.A,QItem:S.A,QItemSection:v.A,QItemLabel:x.A,QPageContainer:R.A,QMenu:T.A}),W()(k,"directives",{ClosePopup:$.A})},1952:(l,e,a)=>{l.exports=a.p+"img/evidence_placeholder.20739530.png"}}]);