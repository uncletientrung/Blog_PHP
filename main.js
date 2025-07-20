const navItems= document.querySelector('.nav__items');
const openNavBtn= document.querySelector('#open__nav-btn');
const closeNavBtn= document.querySelector('#close__nav-btn');

const openNav = () =>{
    navItems.style.display ='flex'; // Khi ấn nút hiện các item sẽ hiện thị 
    openNavBtn.style.display= 'none';   // Ẩn nút mở menu
    closeNavBtn.style.display='inline-block'; // Hiện nút close
}
const closeNav = () =>{
    navItems.style.display ='none'; 
    openNavBtn.style.display= 'inline-block';  
    closeNavBtn.style.display='none'; 
}
openNavBtn.addEventListener('click', openNav);
closeNavBtn.addEventListener('click', closeNav);