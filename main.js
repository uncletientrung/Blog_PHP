section {
    margin-top: 3rem;
    width: 100vw;
}
h1, h2, h3, h4, h5{
    color: var(--color-white);
    line-height: 1.3;
}
h1 {
    font-size: 3rem;
    margin: 1rem 0;
}
h2 {
    font-size: 1.7rem;
    margin: 1rem 0;
}
h3 {
    font-size: 1.1rem;
    margin: 0.8rem 0 0.5rem;
}
h4 {
    font-size: 1rem;
}
a {
    color: var(--color-white);
    transition: var(--transition);
}

img{
    display: block;
    width: 100%;
    object-fit: cover;
}
/* =================================================== NAV ================================================================= */

nav{
    background: var(--color-primary);
    width: 100vw;
    height: 4.5rem;
    position: fixed;
    top: 0;
    z-index: 10;
    box-shadow: 0 1rem 1rem rgba(0, 0, 0, 0.2);
}
nav button{
    display: none;
}
.nav__container{
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.avatar {
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    overflow: hidden;
    border: 0.3rem solid var(--color-bg);
}
.nav__logo {
    font-weight: 600;
    font-size: 1.2rem;
}
.nav__items {
    display: flex;
    align-items: center;
    gap: 4rem;
}