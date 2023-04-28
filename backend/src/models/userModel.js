const mongoose = require('mongoose');

const userSchema = new mongoose.Schema({
    phoneNumber: {
        type: String,
        required: true,
        unique: true,
    },
    profile: {
        name: String,
        services: [String],
    },
});

const User = mongoose.model('User', userSchema);

module.exports = User;
