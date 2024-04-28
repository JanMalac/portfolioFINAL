// tenhle script vytváří vyjížděcí menu na všech stránkách
class Body extends HTMLElement {
  constructor() {
    super();
  }

  connectedCallback() {
    this.innerHTML = `
    <label class="hamburger-menu">
    <input type="checkbox">
    </label>
    <aside class="sidebar">
    <nav>
        <div><a href="index.html">Úvod</a></div>
        <div><a href="grades.html">Známky</a></div>
        <div><a href="game.html">Hra</a></div>
        <div><a target="_blank" href="https://moodle.vut.cz/user/profile.php?id=256773"><img alt="vut profil"
            src="./pictures/vut.png" width="30px" height="30px"></a></div>
        <div><a target="_blank" href="https://www.instagram.com/janmalac/"><img alt="instagram"
            src="./pictures/ig.png" width="30px" height="30px"></a></div>
    </nav>
    </aside>`
    ;
  }
}

customElements.define('body-menu', Body);