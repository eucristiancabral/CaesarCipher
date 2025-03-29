document.addEventListener("DOMContentLoaded", () => {
    const textArea = document.getElementById("text");
    const resultDiv = document.getElementById("result");
    const encryptBtn = document.getElementById("encryptBtn");
    const decryptBtn = document.getElementById("decryptBtn");
    const shift = 3;

    function caesarCipher(text, shift, decrypt = false) {
        return text
            .split("")
            .map(char => {
                if (/[a-zA-Z]/.test(char)) {
                    let code = char.charCodeAt(0);
                    let offset = code >= 65 && code <= 90 ? 65 : 97;
                    let newCode = decrypt
                        ? (code - offset - shift + 26) % 26 + offset
                        : (code - offset + shift) % 26 + offset;
                    return `<span class="highlight">${String.fromCharCode(newCode)}</span>`;
                }
                return char; 
            })
            .join("");
    }

    function animateText(text, element) {
        element.innerHTML = "";
        let tempDiv = document.createElement("div");
        tempDiv.innerHTML = text; // Converte a string para HTML
        let nodes = Array.from(tempDiv.childNodes); // Obtém os elementos como lista

        let index = 0;
        function typeWriter() {
            if (index < nodes.length) {
                element.appendChild(nodes[index]);
                index++;
                setTimeout(typeWriter, 30);
            } else {
                element.style.opacity = "1";
                element.style.transform = "translateY(0)";
            }
        }
        typeWriter();
    }

    function handleEncryption(decrypt = false) {
        let text = textArea.value;
        if (text.trim() === "") {
            resultDiv.innerHTML = "<span style='color: red;'>Digite um texto!</span>";
            resultDiv.style.opacity = "1";
            return;
        }

        let processedText = decrypt
            ? `Descriptografado: ${caesarCipher(text, shift, true)}`
            : `Criptografado: ${caesarCipher(text, shift)}`;

        resultDiv.style.opacity = "0";
        resultDiv.style.transform = "translateY(10px)";

        setTimeout(() => {
            animateText(processedText, resultDiv);
        }, 200);
    }

    encryptBtn.addEventListener("click", () => handleEncryption(false));
    decryptBtn.addEventListener("click", () => handleEncryption(true));
});
