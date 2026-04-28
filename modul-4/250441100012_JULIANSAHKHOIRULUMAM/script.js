
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');
    const htmlElement = document.documentElement;

    themeToggleBtn.addEventListener('click', () => {
      // Ganti class dark pada tag <html>
      htmlElement.classList.toggle('dark');
      
      // Update icon dan simpan pilihan di local storage
      if (htmlElement.classList.contains('dark')) {
        themeIcon.innerText = "light";
        localStorage.setItem('theme', 'dark');
      } else {
        themeIcon.innerText = "dark";
        localStorage.setItem('theme', 'light');
      }
    });

    // Cek tema yang tersimpan sebelumnya
    if (localStorage.getItem('theme') === 'dark') {
      htmlElement.classList.add('dark');
      themeIcon.innerText = "light";
    }

    // Efek smooth scroll untuk navbar
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });
