<?php $this->load->view('system/header')?>
    <div class="container text-center">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#carteira" type="button" role="tab" aria-controls="home" aria-selected="true">
                <i class="fa-solid fa-house"></i>
                Carteira</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#aderencia" type="button" role="tab" aria-controls="profile" aria-selected="false">Aderência</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#cpfl" type="button" role="tab" aria-controls="messages" aria-selected="false">CPFL</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#faq" type="button" role="tab" aria-controls="messages" aria-selected="false">Faq</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#rotinas" type="button" role="tab" aria-controls="messages" aria-selected="false">Rotinas</button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="carteira" role="tabpanel" aria-labelledby="home-tab">
                <?php $this->load->view('carteira/home')?>
            </div>
            <div class="tab-pane" id="aderencia" role="tabpanel" aria-labelledby="profile-tab">
                <?php $this->load->view('aderencia/home')?>
            </div>
            <div class="tab-pane" id="cpfl" role="tabpanel" aria-labelledby="messages-tab">
                <?php $this->load->view('cpfl/home')?>
            </div>
            <div class="tab-pane" id="faq" role="tabpanel" aria-labelledby="messages-tab">
                <?php $this->load->view('faq/home')?>
            </div>
            <div class="tab-pane" id="rotinas" role="tabpanel" aria-labelledby="messages-tab">
                <?php $this->load->view('rotinas/home')?>
            </div>
        </div>
</div>
    
<?php $this->load->view('system/footer')?>
