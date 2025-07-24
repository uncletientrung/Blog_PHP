<?php
    include 'partials/header.php';
?>
        <section class="form__section">
        <div class="container form__section-container">
            <h2>Add Post</h2>
            <div class="alert__message error">
                <p>This is an error message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="Title">
                <select >
                    <option value="1">Red</option>
                    <option value="2">Blue</option>
                    <option value="3">Yellow</option>
                    <option value="4">Green</option>
                    <option value="5">Purple</option>
                    <option value="6">Orange</option>
                </select>
                <textarea rows="10" placeholder="Body"></textarea>
                <div class="form__control inline">
                    <input type="checkbox" id="is_featured" checked>
                    <label for="is_featured" >Featured</label> 
                </div>
                <div class="form__control">
                    <label for="thumbnail">Add Thumbnaii</label>
                    <input type="file" id="thumbnaii">
                </div>
                <button type="submit" class="btn">Add Post</button>
            </form>
        </div>
    </section>
    <!-- XONG FORM ADD CATEGORY -->

<?php
    include '../partials/footer.php';
?>