package ua.com.kistudio.intentserviceexample;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }

    public void loadButton(View view){
        AsyncJsonQuery asyncJsonQuery = new AsyncJsonQuery();
        asyncJsonQuery.execute();
    }
}
