<?php



class Authentification {

    private SQLiteUserRepository $userRepository;

    public function __construct(SQLiteUserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws \Exception
     */
    public function register(string $email, string $password, string $repeat) : bool {
        if($password !== $repeat) {
            throw new \Exception("Mots de passe différents");
        }
        if($this->invalideEmail($email)) {
            throw new \Exception("Email invalide");
        }
        if($this->userRepository->findUserByEmail($email)) {
            throw new \Exception("Utilisateur déjà enregistré");
        }

        $user = new User($email, $password);

        return $this->userRepository->saveUser($user);
    }

    /**
     * @throws \Exception
     */
    public function authenticate(string $email, string $password) : true {
        $user = $this->userRepository->findUserByEmail($email);
        if(!$user || !password_verify($password, $user->getPassword())) {
            throw new \Exception("Mot de pass ou email invalide");
        }
        return true;
    }

    private function invalideEmail(string $email) : bool {
        $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}