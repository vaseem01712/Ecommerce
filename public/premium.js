
(function(){
 const root=document.documentElement;
 const saved=localStorage.getItem('mystore-theme')||'blue';
 root.dataset.theme=saved==='luxury'?'luxury':'blue';
 window.setStoreTheme=function(theme){
   root.dataset.theme=theme==='luxury'?'luxury':'blue';
   localStorage.setItem('mystore-theme',root.dataset.theme);
   document.querySelectorAll('[data-theme-btn]').forEach(b=>b.classList.toggle('active',b.dataset.themeBtn===root.dataset.theme));
 };
 document.addEventListener('DOMContentLoaded',()=>{
   setStoreTheme(root.dataset.theme);
   document.querySelectorAll('[data-like]').forEach(btn=>{
     const id=btn.dataset.like, key='mystore-like-'+id;
     const sync=()=>{const liked=localStorage.getItem(key)==='1';btn.classList.toggle('liked',liked);btn.textContent=liked?'♥':'♡';};
     btn.addEventListener('click',()=>{localStorage.setItem(key,localStorage.getItem(key)==='1'?'0':'1');sync();}); sync();
   });
   document.querySelectorAll('[data-slider]').forEach(slider=>{
     const slides=[...slider.querySelectorAll('.hero-slide')]; if(!slides.length)return;
     let i=0;
     const dots=[...slider.querySelectorAll('.slider-dot')];
     const show=n=>{i=(n+slides.length)%slides.length;slides.forEach((s,j)=>s.classList.toggle('active',j===i));dots.forEach((d,j)=>d.classList.toggle('active',j===i));};
     dots.forEach((d,j)=>d.onclick=()=>show(j));
     slider.querySelector('[data-prev]')?.addEventListener('click',()=>show(i-1));
     slider.querySelector('[data-next]')?.addEventListener('click',()=>show(i+1));
     setInterval(()=>show(i+1),6500);
   });
   document.querySelectorAll('[data-signature-slider]').forEach(slider=>{
     const slides=[...slider.querySelectorAll('.signature-hero-slide')];
     const dots=[...slider.querySelectorAll('.signature-slider-dots button')];
     const current=slider.querySelector('[data-signature-current]');
     if(slides.length < 2)return;
     let active=slides.findIndex(slide=>slide.classList.contains('is-active'));
     let timer;
     const show=index=>{
       active=(index+slides.length)%slides.length;
       slides.forEach((slide,i)=>slide.classList.toggle('is-active',i===active));
       dots.forEach((dot,i)=>dot.classList.toggle('is-active',i===active));
       if(current)current.textContent=String(active+1).padStart(2,'0');
       slider.style.setProperty('--slide-duration','6s');
     };
     const start=()=>{clearInterval(timer);timer=window.setInterval(()=>show(active+1),6000);};
     dots.forEach((dot,index)=>dot.addEventListener('click',()=>{show(index);start();}));
     slider.addEventListener('mouseenter',()=>clearInterval(timer));
     slider.addEventListener('mouseleave',start);
     document.addEventListener('visibilitychange',()=>document.hidden?clearInterval(timer):start());
     show(active < 0 ? 0 : active);
     start();
   });
   document.querySelectorAll('[data-scroll-target]').forEach(btn=>btn.addEventListener('click',()=>{
      document.querySelector(btn.dataset.scrollTarget)?.scrollBy({left:btn.dataset.direction==='left'?-520:520,behavior:'smooth'});
   }));
   document.querySelectorAll('[data-product-rail]').forEach(rail=>{
     const advance=()=>{
       const card=rail.querySelector('.signature-product');
       if(!card)return;
       const next=rail.scrollLeft+card.getBoundingClientRect().width+24;
       rail.scrollTo({left:next >= rail.scrollWidth-rail.clientWidth-4 ? 0 : next,behavior:'smooth'});
     };
     window.setInterval(advance,4200);
   });
   document.querySelectorAll('img').forEach(image=>image.addEventListener('error',()=>{
      if(!image.dataset.imageFallback){
        image.dataset.imageFallback='true';
        image.src='https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?auto=format&fit=crop&w=900&q=85';
      }
   },{once:true}));
   const mobile=document.querySelector('[data-mobile-menu]');
   document.querySelector('[data-mobile-toggle]')?.addEventListener('click',()=>mobile?.classList.toggle('open'));
 });
})();
