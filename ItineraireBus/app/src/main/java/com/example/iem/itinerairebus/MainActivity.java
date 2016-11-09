package com.example.iem.itinerairebus;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    EditText nomUtilisateur, prenomUtilisateur;
    Button authentification;
    TextView resultatUtilisateur;

    @Override
    protected void onCreate(Bundle savedInstanceState) {

        nomUtilisateur = (EditText) findViewById(R.id.nomUtilisateur);
        prenomUtilisateur = (EditText) findViewById(R.id.prenomUtilisateur);
        authentification = (Button) findViewById(R.id.authentification);
        resultatUtilisateur = (TextView) findViewById(R.id.resultatUtilisateur);

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        authentification.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                new Authentification.execute(nomUtilisateur, prenomUtilisateur, resultatUtilisateur, "http://mysilexmvc.local/index.php/users/auth");
            }
        });
    }
}
