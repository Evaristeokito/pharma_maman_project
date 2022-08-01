<!-- user Modal -->
<div id="venteModal" className="iziModal" data-izimodal-group="alerts" data-izimodal-group="alerts">
    <section class="content">
        <div class="container-fluid">
            <!--form-->
            <form role="form" method="post" autocomplete="off" id="formVente">
                <div class="row">
                    <!-- left column -->
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <!-- general form elements -->
                        <!-- Medicament -->
                        <div class="card card-info">
                            <div class="card-body">

                                <!-- reference -->
                                <div class="form-group mb-3">
                                    <label for="#">Reference :<span class="text-danger">*</span> :</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="reference" name="reference" placeholder="reference...">
                                        <span id="error_reference" class="text-danger"></span>
                                    </div>
                                </div>

                                <!-- desgination-->
                                <div class="form-group mb-3">
                                    <label for="#">Designation <span class="text-danger">*</span> :</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="designation" name="designation" placeholder="medicament...">
                                        <span id="error_designation" class="text-danger"></span>
                                    </div>
                                </div>

                                <!-- Format -->
                                <div class="form-group mb-3">
                                    <label for="#">Format <span class="text-danger">*</span> :</label>
                                    <select class="form-control" id="format" name="format">
                                        <option selected>veuillez selectionner le format</option>
                                        <?php foreach($goals as $goal): ?>
                                        <option value="<?= $goal['idformat']; ?>">
                                            <?= $goal['format']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span id="error_format" class="text-danger"></span>
                                </div>

                                <!--En stock et indice -->
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="#">En stock <span class="text-danger">*</span> :</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="qte" name="qte" placeholder="Quantite...">
                                            </div>
                                            <span class="text-danger" id="error_qte"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="#">Indicateur <span class="text-danger">*</span> :</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="indice" name="indice" placeholder="indice...">
                                            </div>
                                            <span class="text-danger" id="error_indice"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--End stock et indice -->

                                <div class="row">
                                    <div class="col-6">
                                        <!-- date d'expiration-->
                                        <div class="form-group">
                                            <label for="#">Date expiration<span class="text-danger">*</span> :</label>
                                            <div class="input-group mb-3">
                                                <input type="date" id="date_expiration" name="date_expiration" class="form-control">
                                            </div>
                                            <span class="text-danger" id="error_date_expiration"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <!--  disponible-->
                                        <div class="form-group mb-3">
                                            <label for="#">Activation du produit :</label>
                                            <select name="disponible" id="disponible" class="form-control">
                                                <option selected>veuillez activer le produit</option>
                                                <option value="Actif">Actif</option>
                                                <option value="Inactif">Inactif</option>
                                            </select>
                                            <span class="text-danger" id="error_disponible"></span>
                                        </div>
                                        
                                    </div>
                                </div>

                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->

                    <!-- right column -->
                    <div class="col-lg-6 col-md-12 col-xs-12">
                        <div class="card card-info">
                            <div class="card-body">

                                <!-- Famille -->
                                <div class="form-group">
                                    <label>Famille <span class="text-danger">*</span> :</label>
                                    <select class="form-control" name="famille" id="famille">
                                        <option selected>Selectionner</option>
                                        <?php foreach($res as $resultat): ?>
                                        <option value="<?php echo $resultat['idfamille']; ?>">
                                            <?php echo $resultat['famille']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="text-danger" id="error_famille" name="error_famille"></span>
                                </div>

                                <!-- fabricant-->
                                <div class="form-group">
                                    <label for="#">Fabricant :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="fabricant" name="fabricant" placeholder="Fabricant">
                                    </div>
                                </div>

                                <!-- emplacement-->
                                <div class="form-group">
                                    <label for="#">Emplacement <span class="text-danger">*</span> :</label>
                                    <div class="input-group mb-3">
                                        <textarea name="emplacement" id="emplacement" placeholder="Emplacement du produit..." class="form-control" cols="30" rows="5"></textarea>
                                    </div>
                                    <span class="text text-danger" id="error_emplacement"></span>
                                </div>

                                <div class="form-group mb-3 mt-5">
                                    <div class="float-right">
                                        <button type="reset" class="btn btn-danger btn-sm">Annuler</button>
                                        <input type="hidden" name="produit_id" id="produit_id">
                                        <input type="hidden" id="action" name="action" value="Add">
                                        <input type="submit" id="button_action" name="button_action" class="btn btn-primary btn-sm" value="Add">
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->

                </div>
                <!-- /.row -->
            </form>
            <!-- /. form-->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
<!-- end Produit Modal -->

<script> 
    $('#venteModal').iziModal({
        title: 'Nouvelle vente',
        subtitle : 'vente des produits',
        headerColor: '#1e88e5',
        loop: false,
        padding: 10,
        iframe: false,
        width: 1200,
        overlay: false,
        zindex: 2000,
    });
</script>