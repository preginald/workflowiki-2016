<script>
    export default {
        props: ['process'],

        ready() {
            console.log('Process Component ready.')
        }
    }
</script>

<template>
    <div>
        <h2>{{ process.name }}</h2>
        <p>{{ process.description }}</p>

        <hr />
        
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Process Name</label>
                <input type="text" name="name" id="name" v-model="process.name" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="description">Process Description</label>
                <textarea name="description" id="description" rows="3" cols="40" class="form-control" v-model="process.description"></textarea>
            </div>
        </form>
    </div>
</template>
