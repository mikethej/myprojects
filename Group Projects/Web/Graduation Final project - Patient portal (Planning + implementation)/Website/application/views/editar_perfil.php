<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                            <h4 class="title">Editar Conta</h4>
                            <p class="category">Edite os dados relativos à sua conta</p>
                    </div>
                    <div class="content" >
                        <form method="POST" action="<?php echo base_url('index.php/Portal_Utente/editar_perfil');?>" >
                            <div class="form-group">
                                <label>Nome completo</label>
                                <input type="text" name="nome" class="form-control" placeholder="<?php echo $inf[0]['nome_completo']; ?>" value="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="<?php echo $inf[0]['email']; ?>" value="">
                            </div>

                            <div class="form-group">
                                <label>Morada</label>
                                <input type="text" name="morada" class="form-control" placeholder="<?php echo $inf[0]['morada']; ?>" value="">
                            </div>
                            
                            <button type="submit" class="btn btn-info btn-fill" value="Submeter">Submeter</button>  
                                

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Alterar senha</h4>
                        <p class="category">Altere a sua senha de acesso ao Portal do Utente</p>
                    </div>
                    <div class="content" >

                        <?php
                        $old_password = array(
                                'name'	=> 'old_password',
                                'id'		=> 'old_password',
                                'size' 	=> 30,
                                'class'     =>'form-control',
                                'value' => set_value('old_password')
                        );

                        $new_password = array(
                                'name'	=> 'new_password',
                                'id'		=> 'new_password',
                                'class'     =>'form-control',
                                'size'	=> 30
                        );

                        $confirm_new_password = array(
                                'name'	=> 'confirm_new_password',
                                'id'		=> 'confirm_new_password',
                                'class'     =>'form-control',
                                'size' 	=> 30
                        );

                        ?>

                        <fieldset>
                        <?php echo form_open('index.php/Autenticacao/change_password'); ?>

                        <?php echo $this->dx_auth->get_auth_error(); ?>

                        <dl>
                                <dt><?php echo form_label('Senha antiga', $old_password['id']); ?></dt>
                                <dd>
                                        <?php echo form_password($old_password); ?>
                                        <?php echo form_error($old_password['name']); ?>
                                </dd><br>

                                <dt><?php echo form_label('Nova senha', $new_password['id']); ?></dt>
                                <dd>
                                        <?php echo form_password($new_password);?>
                                        <?php echo form_error($new_password['name']); ?>
                                </dd><br>

                                <dt><?php echo form_label('Confirme a nova senha', $confirm_new_password['id']);?></dt>
                                <dd>
                                        <?php echo form_password($confirm_new_password); ?>
                                        <?php echo form_error($confirm_new_password['name']); ?>
                                </dd>

                                <dt></dt><br>
                                <dd><p><input class="btn btn-info btn-fill" type="submit" name="change_password" value="Alterar Senha"  /></p></dd>
                        </dl>

                        <?php echo form_close(); ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>