<!-- //pour configurez le serveur xampp pour les mail https://www.youtube.com/watch?v=wx1FjdhDyUY
//tuto envoie de mail https://www.youtube.com/watch?v=SXKzTjxXW88 -->


<div class="container ">
            <div class="row">
                <div class="col-12 justify-content-center py-5">
                    <h1 class="text-center">Contact</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <form class="col-lg-8" action="?home&action=contact_email" method="POST">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">

                            <label for="sujet" class="form-label">Sujet</label>
                            <select class="form-select" id="sujet" aria-label="Sélectionnez une option">
                                <option selected>Choisissez...</option>
                                <option value="particulierIns">Inscription Particulier</option>
                                <option value="ProfessionnelIns">Inscription Professionnel</option>
                                <option value="ParticulierCon">Connexion Professionnel</option>
                                <option value="ProfessionnelCon">Connexion Particulier</option>
                                <option value="rgpd">RGPD</option>
                                <option value="mentionlegale">Mention Légale</option>
                                <option value="autres">Autres</option>
                            </select>

                        </div>
                        <div class="row">
                            <!-- Colonnes de gauche -->
                            <div class="col-lg-5">

                                <div class="mb-3">

                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        aria-describedby="email">
                                </div>
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nom">
                                </div>
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom"
                                        aria-describedby="prenom">
                                </div>
                                <div class="mb-3">
                                    <label for="telephone" class="form-label">Téléphone</label>
                                    <input type="text" class="form-control" id="telephone" name="telephone"
                                        aria-describedby="telephone">
                                </div>
                            </div>

                            <!-- Colonnes de droite -->
                            <div class="col-lg-7">

                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" name="message"
                                        aria-describedby="message" rows="12"></textarea>
                                </div>




                            </div>
                        </div>
                    </div>

                    <!-- Bouton au bas du milieu -->
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>