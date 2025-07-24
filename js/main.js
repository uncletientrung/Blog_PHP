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

// Xử lý dashboard IP
const sidebar= document.querySelector('aside');  // Lấy thẻ chứ không lấy biên
const showSidebarBtn= document.querySelector('#show__sidebar-btn'); // Lấy id show...
const hideSidebarBtn= document.querySelector('#hide__sidebar-btn');

const showSidebar = () =>{
    sidebar.style.left='0';
    showSidebarBtn.style.display='none';
    hideSidebarBtn.style.display='inline-block';
}
const hideSidebar = () =>{
    sidebar.style.left='-100%';
    showSidebarBtn.style.display='inline-block';
    hideSidebarBtn.style.display='none';
}
showSidebarBtn.addEventListener('click',showSidebar);
hideSidebarBtn.addEventListener('click',hideSidebar);