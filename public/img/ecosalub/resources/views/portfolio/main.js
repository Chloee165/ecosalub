new Vue({
    el: '#app',
    data: {
        projects: [
            { id: 1, title: 'Project 1', description: 'Description for project 1', image: 'path-to-image-1', link: 'link-to-project-1' },
            { id: 2, title: 'Project 2', description: 'Description for project 2', image: 'path-to-image-2', link: 'link-to-project-2' },
            { id: 3, title: 'Project 3', description: 'Description for project 3', image: 'path-to-image-3', link: 'link-to-project-3' }
        ]
    },
    methods: {
        sendEmail() {
            // Implement your email sending functionality here
            alert('Email sent!');
        }
    }
});
