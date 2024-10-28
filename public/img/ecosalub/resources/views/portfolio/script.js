document.addEventListener('scroll', () => {
    const scrollPosition = window.scrollY;
    const sections = document.querySelectorAll('section');

    sections.forEach(section => {
        if (section.offsetTop <= scrollPosition + window.innerHeight * 0.75) {
            section.classList.add('visible');
        } else {
            section.classList.remove('visible');
        }
    });
});

// Example for fading effect
const styles = `
    section {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }
    section.visible {
        opacity: 1;
    }
`;
const styleSheet = document.createElement("style");
styleSheet.type = "text/css";
styleSheet.innerText = styles;
document.head.appendChild(styleSheet);


consoleText(['Designer et développeuse web', 'Une collègue agréable!', 'Étudiante bientôt diplômée'], 'text1', [ 'rgb(59, 145, 102)', 'rgb(207, 101, 14)', ' rgb(15, 141, 150)']);

        function consoleText(words, id, colors) {
            if (colors === undefined) colors = ['black'];
            let visible = true;
            const con = document.getElementById('console');
            let letterCount = 1;
            let x = 1;
            let waiting = false;
            const target = document.getElementById(id);
            target.setAttribute('style', 'color:' + colors[0]);

            window.setInterval(function() {
                if (letterCount === 0 && waiting === false) {
                    waiting = true;
                    target.innerHTML = words[0].substring(0, letterCount);
                    window.setTimeout(function() {
                        const usedColor = colors.shift();
                        colors.push(usedColor);
                        const usedWord = words.shift();
                        words.push(usedWord);
                        x = 1;
                        target.setAttribute('style', 'color:' + colors[0]);
                        letterCount += x;
                        waiting = false;
                    }, 1000);
                } else if (letterCount === words[0].length + 1 && waiting === false) {
                    waiting = true;
                    window.setTimeout(function() {
                        x = -1;
                        letterCount += x;
                        waiting = false;
                    }, 1000);
                } else if (waiting === false) {
                    target.innerHTML = words[0].substring(0, letterCount);
                    letterCount += x;
                }
            }, 120);

            window.setInterval(function() {
                if (visible === true) {
                    con.className = 'console-underscore hidden';
                    visible = false;
                } else {
                    con.className = 'console-underscore';
                    visible = true;
                }
            }, 400);
        }
        function updateText(text) {
            let delay = 200;
          
            let h1 = document.getElementById("animated");
          
            h1.innerHTML = text
              .split("")
              .map(letter => {
                return letter === " " ? `<span class="space"></span>` : `<span>${letter}</span>`;
              })
              .join("");
          
            // Clear previous animations before applying new ones
            Array.from(h1.children).forEach((span, index) => {
              span.classList.remove("wavy"); // Remove previous class
              setTimeout(() => {
                span.classList.add("wavy");
              }, index * 60 + delay);
            });
          }
          
          // Event listener for input changes
          document.getElementById('textField').addEventListener('input', (event) => {
            updateText(event.target.value);
          });
          
          // Initial text
          updateText("Mais qui suis-je..?");

          ddocument.getElementById('burgerBtn').addEventListener('click', function() {
            const navMenu = document.getElementById('navMenu');
            const socialMenu = document.getElementById('socialMenu');
            navMenu.classList.toggle('show'); // Toggle the 'show' class for nav
            socialMenu.classList.toggle('show'); // Toggle the 'show' class for social icons
        });
        
          