<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login e Registro</title>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    font-family: 'Times New Roman', serif;
    background: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  .container {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    position: relative;
    overflow: hidden;
    width: 720px;
    max-width: 90%;
    min-height: 500px;
    transition: all 0.6s ease;
  }

  .form-container {
    position: absolute;
    top: 0;
    height: 100%;
    width: 50%;
    padding: 60px 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: #fff;
    transition: transform 0.6s ease, opacity 0.6s ease;
  }

  .sign-in-container {
    left: 0;
    z-index: 2;
  }

  .sign-up-container {
    left: 0;
    opacity: 0;
    z-index: 1;
  }

  .container.right-panel-active .sign-in-container {
    transform: translateX(100%);
    opacity: 0;
    z-index: 1;
  }

  .container.right-panel-active .sign-up-container {
    transform: translateX(100%);
    opacity: 1;
    z-index: 2;
  }

  form {
    width: 100%;
    max-width: 320px;
    text-align: center;
  }

  h1 {
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 25px;
    color: #333;
  }

  input {
    width: 100%;
    padding: 12px 15px;
    margin: 10px 0;
    font-family: 'Times New Roman', serif;
    font-size: 1rem;
    border: 1.8px solid #ddd;
    border-radius: 6px;
    transition: border-color 0.3s ease;
  }

  input:focus {
    border-color: #ff4b2b;
    outline: none;
  }

  button {
    margin-top: 20px;
    width: 100%;
    padding: 14px 0;
    border: none;
    border-radius: 30px;
    background-color: #ff4b2b;
    color: #fff;
    font-weight: 700;
    font-size: 1.1rem;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 1.1px;
    transition: background-color 0.3s ease;
  }

  button:hover {
    background-color: #e13b1b;
  }

  button.ghost {
    background-color: transparent;
    border: 2px solid #fff;
    color: #fff;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  button.ghost:hover {
    background-color: #fff;
    color: #ff416c;
  }

  .cancel-btn {
    margin-top: 10px;
    width: 100%;
    padding: 12px 0;
    border-radius: 30px;
    background-color: #999;
    color: white;
    font-family: 'Times New Roman', serif;
    font-size: 1rem;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s ease;
  }

  .cancel-btn:hover {
    background-color: #777;
  }

  /* Campo senha com botão olho SVG */
  .input-password-container {
    position: relative;
    margin: 10px 0;
  }
  .input-password-container input {
    padding-right: 40px; /* espaço para o botão */
  }
  .input-password-container button {
    position: absolute;
    right: 8px; /* perto da borda direita */
    top: 20%;
    transform: translateY(-50%);
    background: transparent;
    border: none;
    cursor: pointer;
    padding: 0;
    line-height: 1;
    user-select: none;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
  }
  .input-password-container button svg {
    stroke: #777;
    width: 18px;
    height: 18px;
    transition: stroke 0.3s ease;
  }
  .input-password-container button:hover svg,
  .input-password-container button:active svg {
    stroke: #ff4b2b;
  }

  .overlay-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease;
    z-index: 100;
  }

  .container.right-panel-active .overlay-container {
    transform: translateX(-100%);
  }

  .overlay {
   background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
   animation: azulGradientAnim 15s ease infinite;
    color: white;
    height: 100%;
    width: 200%;
    background-size: 400% 400%;
    position: relative;
    left: -100%;
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding: 0 40px;
    box-sizing: border-box;
    transition: transform 0.6s ease;
  }

  .container.right-panel-active .overlay {
    transform: translateX(50%);
  }

  .overlay-panel {
    width: 45%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 0 20px;
  }

  .overlay-panel h1 {
    font-size: 2.2rem;
    margin-bottom: 15px;
  }

  .overlay-panel p {
    font-size: 1rem;
    line-height: 1.4;
    margin-bottom: 30px;
  }

  a {
    color: #333;
    font-size: 0.9rem;
    margin: 10px 0;
    text-decoration: none;
    user-select: text;
  }

  a:hover {
    text-decoration: underline;
  }

  /* Responsividade */
  @media (max-width: 768px) {
    .container {
      width: 100%;
      min-height: 650px;
      border-radius: 0;
      box-shadow: none;
    }

    .form-container {
      position: relative;
      width: 100%;
      opacity: 1 !important;
      transform: none !important;
      padding: 40px 20px;
      height: auto;
      z-index: 1 !important;
    }

    .sign-in-container,
    .sign-up-container {
      left: 0;
      width: 100%;
    }

    .overlay-container {
      display: none;
    }

    form {
      max-width: 100%;
      padding: 0 10px;
    }

    button,
    .cancel-btn {
      width: 100%;
    }
  }

  @keyframes azulGradientAnim {
    0% {
      background-position: 0% 50%;
    }
    50% {
      background-position: 100% 50%;
    }
    100% {
      background-position: 0% 50%;
    }
  }
</style>
</head>
<body>
  <div class="container" id="container">
    <!-- Registro -->
    <div class="form-container sign-up-container">
      <form id="registerForm">
        <h1>Criar Conta</h1>
        <input type="text" placeholder="Nome" name="name" required />
        <input type="email" placeholder="Email" name="email" required />
        <div class="input-password-container">
          <input type="password" placeholder="Senha" name="password" id="passwordRegister" required />
          <button type="button" aria-label="Mostrar senha" id="togglePasswordRegister" title="Mostrar/Ocultar senha">
            <!-- SVG olho -->
            <svg viewBox="0 0 24 24" fill="none" stroke="#777" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
        
        <div class="btn-group">
          <button type="submit">Registrar</button>
          <button type="button" class="cancel-btn" onclick="window.location.href='index.html'">Cancelar</button>
        </div>
      </form>
    </div>

    <!-- Login -->
    <div class="form-container sign-in-container">
      <form id="loginForm">
        <h1>Entrar</h1>
        <input type="email" placeholder="Email" name="email" required />
        <div class="input-password-container">
          <input type="password" placeholder="Senha" name="password" id="passwordLogin" required />
          <button type="button" aria-label="Mostrar senha" id="togglePasswordLogin" title="Mostrar/Ocultar senha">
            <!-- SVG olho -->
            <svg viewBox="0 0 24 24" fill="none" stroke="#777" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
        <a href="#">Esqueceu a senha?</a>
        
        <div class="btn-group">
          <button type="submit">Login</button>
          <button type="button" class="cancel-btn" onclick="window.location.href='index.html'">Cancelar</button>
        </div>
      </form>
    </div>

    <!-- Painel -->
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Bem-vindo de volta!</h1>
          <p>Para continuar, faça login com suas credenciais</p>
          <button class="ghost" id="signIn">Entrar</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Olá, Amigo!</h1>
          <p>Insira seus dados e comece sua jornada conosco</p>
          <button class="ghost" id="signUp">Registrar</button>
        </div>
      </div>
    </div>
  </div>

<script>
  const container = document.getElementById('container');
  const signUpBtn = document.getElementById('signUp');
  const signInBtn = document.getElementById('signIn');

  signUpBtn.addEventListener('click', () => {
    container.classList.add("right-panel-active");
  });

  signInBtn.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
  });

  // Toggle senha - login
  const passwordLoginInput = document.getElementById('passwordLogin');
  const togglePasswordLogin = document.getElementById('togglePasswordLogin');
  togglePasswordLogin.addEventListener('click', () => {
    const type = passwordLoginInput.type === 'password' ? 'text' : 'password';
    passwordLoginInput.type = type;
  });

  // Toggle senha - registro
  const passwordRegisterInput = document.getElementById('passwordRegister');
  const togglePasswordRegister = document.getElementById('togglePasswordRegister');
  togglePasswordRegister.addEventListener('click', () => {
    const type = passwordRegisterInput.type === 'password' ? 'text' : 'password';
    passwordRegisterInput.type = type;
  });

  // LOGIN - envia para login.php e trata resposta
  document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('login.php', {
      method: 'POST',
      body: formData,
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        alert(data.success);
        // Exemplo: redirecionar para dashboard após login
        window.location.href = "painel.php";
      } else {
        alert(data.error || "Erro no login.");
      }
    })
    .catch(() => alert("Erro ao conectar com o servidor."));
  });

  // REGISTRO - envia para registro.php e trata resposta
  document.getElementById("registerForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const name = this.name.value.trim();
    const email = this.email.value.trim();
    const password = this.password.value;

    if (name.length < 3) {
      alert("Nome deve ter pelo menos 3 caracteres.");
      return;
    }
    if (!email.includes("@")) {
      alert("Email inválido.");
      return;
    }
    if (password.length < 6) {
      alert("Senha deve ter pelo menos 6 caracteres.");
      return;
    }

    const formData = new FormData(this);

    fetch('registro.php', {
      method: 'POST',
      body: formData,
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        alert(data.success);
        // Opcional: limpar formulário ou mudar para tela de login
        container.classList.remove("right-panel-active");
        this.reset();
      } else {
        alert(data.error || 'Erro no registro.');
      }
    })
    .catch(() => alert('Erro de conexão com servidor.'));
  });

// Pega o redirect da URL
const urlParams = new URLSearchParams(window.location.search);
const redirectUrl = urlParams.get('redirect') || 'index.html'; // página padrão

// Depois do login ou registro bem sucedido:
window.location.href = redirectUrl;

</script>
</body>
</html>
