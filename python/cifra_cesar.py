import tkinter as tk

# Função para aplicar a Cifra de César
def cifra_cesar(texto, chave):
    resultado = ""
    for char in texto:
        if char.isalpha():
            offset = ord('A') if char.isupper() else ord('a')
            resultado += chr((ord(char) - offset + chave) % 26 + offset)
        else:
            resultado += char
    return resultado

# Funções para criptografar e descriptografar
def criptografar():
    texto = entrada_texto.get("1.0", "end-1c")
    resultado_label.config(text="Criptografado: " + cifra_cesar(texto, 3))

def descriptografar():
    texto = entrada_texto.get("1.0", "end-1c")
    resultado_label.config(text="Descriptografado: " + cifra_cesar(texto, -3))

# Criando a janela principal
root = tk.Tk()
root.title("Cifra de César")
root.geometry("500x300")

# Criando um frame para centralizar os elementos
frame = tk.Frame(root, padx=20, pady=20)
frame.pack(expand=True)

# Widgets da interface
tk.Label(frame, text="Cifra de César", font=("Arial", 16)).pack()
tk.Label(frame, text="Digite o texto:").pack(pady=5)

entrada_texto = tk.Text(frame, height=5, width=40)
entrada_texto.pack()

# Criando um frame para os botões
botoes_frame = tk.Frame(frame)
botoes_frame.pack(pady=10)

tk.Button(botoes_frame, text="Criptografar", width=15, command=criptografar).grid(row=0, column=0, padx=5)
tk.Button(botoes_frame, text="Descriptografar", width=15, command=descriptografar).grid(row=0, column=1, padx=5)

resultado_label = tk.Label(frame, text="", font=("Arial", 12), fg="blue")
resultado_label.pack(pady=10)

root.mainloop()

#PARA EXECUTAR SIGA OS PASSOS: 

# Através do terminal, navegue até a pasta onde está salvo o arquivo "cifra_cesar.py". Depois, digite " python cifra_cesar.py "
