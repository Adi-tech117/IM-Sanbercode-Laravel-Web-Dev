<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Buat Account Baru !</h1>
    <a href="/welcome">kembali</a>
    <h2>Sign Up Form</h2>
    <form action="/welcome" method="POST">
        @csrf
        <label>First name</label><br>
        <input type="text" name="firstname" placeholder="Masukan nama depan Anda !" required><br><br>
        <label>Last name</label><br>
        <input type="text" name="lastname" placeholder="Masukkan nama belakang Anda !" required><br><br>
        <label>Gender :</label><br>
        <input type="radio" name="gender" value="1"> Male <br>
        <input type="radio" name="gender" value="2"> Female <br>
        <input type="radio" name="gender" value="3"> Other <br><br>
        <label >Nationality :</label><br>
        <select name="Warganegara">
            <option value="1">Indonesia</option>
            <option value="2">Inggris</option>
            <option value="3">Arab</option>
            <option value="4">Mandarin</option>
            <option value="5">Rusia</option>
            <option value="6">Perancis</option>
            <option value="7">Urdu</option>
        </select><br><br>
        <label >language Spoken :</label><br>
        <input type="checkbox" name="bahasa" value="1"> Bahasa Indonesia <br>
        <input type="checkbox" name="bahasa" value="2"> English <br>
        <input type="checkbox" name="bahasa" value="3"> Other <br><br>
        <label >Bio :</label><br>
        <textarea name="bio" id="" cols="30" rows="10"></textarea><br><br>
        <input type="submit" value="Sign Up">
        
    </form>
    
</body>
</html>