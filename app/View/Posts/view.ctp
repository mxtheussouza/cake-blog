<div style="background: #f1f2f3; padding: 2rem; height: 100%;">
    <div style="height: 100%; display:flex; justify-content: center; align-items: center; flex-direction: column;">
        <div style="background: #fff; width: 300px; max-width: 100%; border-radius: 1rem; padding: 1rem; box-shadow: 0px 3px 20px 0px rgba(13, 21, 75, 0.3);">
            <h1><?php echo $post['Post']['titulo']?></h1>

            <hr>

            <p><strong>ID: </strong><?php echo $post['Post']['id']?></p>

            <p><strong>Criado em: </strong><?php echo $post['Post']['created']?></p>
        </div>
    </div>
</div>