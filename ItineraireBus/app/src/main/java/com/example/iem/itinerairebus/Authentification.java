package com.example.iem.itinerairebus;

import android.os.AsyncTask;
import android.widget.TextView;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

/**
 * Created by iem on 09/11/2016.
 */

public class Authentification extends AsyncTask<Object, Void, String> {

    TextView resultatUtilisateur = null;
    String nomUtilisateur, prenomUtilisateur, resultat, urlApi = "";
    @Override
    protected String doInBackground(Object[] params) {

        URL authentificationApi = null;
        HttpURLConnection authentificationApiConnection = null;
        BufferedReader in = null;

        urlApi = (String) params[1];

        try {
            authentificationApi = new URL(urlApi);
        } catch (MalformedURLException e) {
            e.printStackTrace();
        }

        try {
            authentificationApiConnection = (HttpURLConnection) authentificationApi.openConnection();
        } catch (IOException e) {
            e.printStackTrace();
        }

        try {
            in = new BufferedReader(new InputStreamReader((authentificationApiConnection.getInputStream())));
            resultat = (String) in.readLine();
            in.close();
        } catch (IOException e) {
            e.printStackTrace();
        }



        return resultat;
    }
}
