using UnityEngine;
using System.Collections;

public class phpUnity1 : MonoBehaviour
{
    private string url = "http://localhost/unity/phpunity1.php?id=1&cid=123456";  //带get参数id和cid的url

    void OnGUI()
    {
        if (GUILayout.Button("get php"))
        {
            StartCoroutine(OnGet());
        }
    }

    IEnumerator OnGet()
    {
        WWW www = new WWW(url);

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