using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class phpunity2 : MonoBehaviour {



    private string url = "http://localhost/unity/phpunity2.php";  

    void OnGUI()
    {
        if (GUILayout.Button("Post php"))
        {
            StartCoroutine(OnGet());
        }
    }

    IEnumerator OnGet()
    {
        //表单
        WWWForm form = new WWWForm();
        form.AddField("id", 1);
        form.AddField("cid", 123456);

        WWW www = new WWW(url, form);

        yield return www;

        if (www.error != null)
        {
            print("php请求错误: 代码为" + www.error);
        }
        else
        {
            print("php请求成功" + www.text);
        }
    }
}