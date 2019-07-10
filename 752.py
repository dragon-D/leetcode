from queue import Queue
import sys

class Solution:
    def openLock(self, deadends, target: str) -> int:
        deadends = set(deadends) # in 操作在set中时间复杂度为O(1)
        if '0000' in deadends:
            return -1

        # -------------------------------BFS 开始----------------------------------
        # 初始化根节点
        q = Queue()
        q.put(('0000', 0)) # (当前节点值，转动步数)

        # 开始循环队列
        while not q.empty():

            # 取出一个节点
            node, step = q.get()

            # 放入周围节点
            for i in range(4):
                for add in (-1,1):
                    cur = node[:i] + str((int(node[i]) + add) % 10) + node[i+1:]
                    print((int(node[i]) + add) % 10)
                    print(str((int(node[i]) + add) % 10))
                    sys.exit(1)
                    if cur == target:
                        return step + 1
                    if not cur in deadends:
                        q.put((cur, step + 1))

                        deadends.add(cur) # 避免重复搜索


        # -------------------------------------------------------------------------
        return -1
deadends = ["0201","0101","0102","1212","2002"]
t = '0202'
a = Solution()
b = a.openLock(deadends,t)
print(b)