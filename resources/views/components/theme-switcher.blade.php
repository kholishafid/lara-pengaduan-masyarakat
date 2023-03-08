<div class="theme-light" id="light">
  <img src="{{asset('/icon/sun.svg')}}" alt="theme">
</div>
<div class="theme-dark" id="dark">
  <img src="{{asset('/icon/moon.svg')}}" alt="theme">
</div>

<script>
  const themeLightBtn = document.getElementById('light');
  const themeDarkBtn = document.getElementById('dark');
  const webTheme = document.querySelector('[data-theme]');

  function setLight() {
    webTheme.setAttribute('data-theme','light');
    themeLightBtn.style.display = 'none'
    themeDarkBtn.style.display = 'block'
    localStorage.setItem('theme','light');
  }
  
  function setDark() {
    console.log('first')
    webTheme.setAttribute('data-theme','dark');
    themeDarkBtn.style.display = 'none'
    themeLightBtn.style.display = 'block'
    localStorage.setItem('theme','dark');
  }
  themeLightBtn.addEventListener('click', () => {
    setLight()
  }
  )
  themeDarkBtn.addEventListener('click', () => {
    setDark()
  })
  const theme = localStorage.getItem('theme');
  theme === 'light' ? setLight() : setDark(); 
</script>