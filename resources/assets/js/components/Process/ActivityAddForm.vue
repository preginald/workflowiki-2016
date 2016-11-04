<script>
    export default {
        ready() {
            console.log('Process Component ready.')
        }
    }
</script>

<template>
    <div>
        <hr />
        
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Process Name</label>
                <input type="text" name="name" id="name" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="description">Process Description</label>
                <textarea name="description" id="description" rows="3" cols="40" class="form-control"></textarea>
            </div>
        </form>
    </div>
</template>
